<?php

namespace Epidoux\OAuthExternalBundle\Services;


/**
 * Class OAuthService which manage the oauth connection
 * @package Epidoux\OAuthExternalBundle\Managers
 * @author Eric Pidoux
 * @version 1.0
 */
class OAuthService {

    /**
     * @var the Logger
     */
    private $logger;

    /**
     * OAuth constructor
     * @param $logger the logger service
     */
    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * Stage 1 of oauth authentification process
     * @param $connector
     * @return string url of auth process or $token
     */
    public function getRequestToken($connector)
    {
        $request_token = $connector->getClient()->getRequestToken( $connector->getConfigElement("request_token_url"), $connector->getConfigElement("redirect_uri") );
        print_r($request_token);exit;
        //prepare data for url
        switch(intval($connector->getConfigElement("oauth_version")))
        {
            case 1:
                break;
            case 2:
                break;
        }
        return $connector->getConfigElement('dialog_url').$request_token['oauth_token_secret'];
    }

    /**
     * Stage 2 of oauth authentification process
     */
    public function getAuthorizeUrl($connector)
    {

    }

    /**
     * Request oauth token
     * @param $version string version of oauth (1;1a;2)
     * @param $url string
     * @throws Exception
     */
    public function requestToken($version,$url)
    {
        switch(intval($version))
        {
            case "1":
                $one_a = $version=="1a"?true:false;
                if(!$this->GetAccessToken($access_token,$url))
                    return false;
                if(IsSet($access_token['authorized'])
                    && IsSet($access_token['value']))
                {
                    $expired = (IsSet($access_token['expiry']) && strcmp($access_token['expiry'], gmstrftime('%Y-%m-%d %H:%M:%S')) <= 0);
                    if(!$access_token['authorized']
                        || $expired)
                    {
                        if($expired)
                            $this->logger->err('The OAuth token expired on '.$access_token['expiry'].'UTC');
                        else
                            $this->logger->err('The OAuth token is not yet authorized');
                        $this->logger->debug('Checking the OAuth token and verifier');

                        if(!$this->GetRequestToken($token, $verifier))
                            return false;
                        if(!IsSet($token)
                            || ($one_a
                                && !IsSet($verifier)))
                        {
                            if(!$this->GetRequestDenied($denied))
                                return false;
                            if(IsSet($denied)
                                && $denied === $access_token['value'])
                            {
                                if($this->debug)
                                    $this->OutputDebug('The authorization request was denied');
                                $this->authorization_error = 'the request was denied';
                                return true;
                            }
                            else
                            {
                                if($this->debug)
                                    $this->OutputDebug('Reset the OAuth token state because token and verifier are not both set');
                                $access_token = array();
                            }
                        }
                        elseif($token !== $access_token['value'])
                        {
                            if($this->debug)
                                $this->OutputDebug('Reset the OAuth token state because token does not match what as previously retrieved');
                            $access_token = array();
                        }
                        else
                        {
                            if(!$this->GetAccessTokenURL($url))
                                return false;
                            $oauth = array(
                                'oauth_token'=>$token,
                            );
                            if($one_a)
                                $oauth['oauth_verifier'] = $verifier;
                            $this->access_token_secret = $access_token['secret'];
                            $options = array('Resource'=>'OAuth access token');
                            $method = strtoupper($this->token_request_method);
                            switch($method)
                            {
                                case 'GET':
                                    break;
                                case 'POST':
                                    $options['PostValuesInURI'] = true;
                                    break;
                                default:
                                    $this->error = $method.' is not a supported method to request tokens';
                                    break;
                            }
                            if(!$this->SendAPIRequest($url, $method, array(), $oauth, $options, $response))
                                return false;
                            if(strlen($this->access_token_error))
                            {
                                $this->authorization_error = $this->access_token_error;
                                return true;
                            }
                            if(!IsSet($response['oauth_token'])
                                || !IsSet($response['oauth_token_secret']))
                            {
                                $this->authorization_error= 'it was not returned the access token and secret';
                                return true;
                            }
                            $access_token = array(
                                'value'=>$response['oauth_token'],
                                'secret'=>$response['oauth_token_secret'],
                                'authorized'=>true
                            );
                            if(IsSet($response['oauth_expires_in'])
                                && $response['oauth_expires_in'] == 0)
                            {
                                if($this->debug)
                                    $this->OutputDebug('Ignoring access token expiry set to 0');
                                $this->access_token_expiry = '';
                            }
                            elseif(IsSet($response['oauth_expires_in']))
                            {
                                $expires = $response['oauth_expires_in'];
                                if(strval($expires) !== strval(intval($expires))
                                    || $expires <= 0)
                                    return($this->SetError('OAuth server did not return a supported type of access token expiry time'));
                                $this->access_token_expiry = gmstrftime('%Y-%m-%d %H:%M:%S', time() + $expires);
                                if($this->debug)
                                    $this->OutputDebug('Access token expiry: '.$this->access_token_expiry.' UTC');
                                $access_token['expiry'] = $this->access_token_expiry;
                            }
                            else
                                $this->access_token_expiry = '';

                            if(!$this->StoreAccessToken($access_token))
                                return false;
                            if($this->debug)
                                $this->OutputDebug('The OAuth token was authorized');
                        }
                    }
                    elseif($this->debug)
                        $this->OutputDebug('The OAuth token was already authorized');
                    if(IsSet($access_token['authorized'])
                        && $access_token['authorized'])
                    {
                        $this->access_token = $access_token['value'];
                        $this->access_token_secret = $access_token['secret'];
                        return true;
                    }
                }
                else
                {
                    if($this->debug)
                        $this->OutputDebug('The OAuth access token is not set');
                    $access_token = array();
                }
                if(!IsSet($access_token['authorized']))
                {
                    if($this->debug)
                        $this->OutputDebug('Requesting the unauthorized OAuth token');
                    if(!$this->GetRequestTokenURL($url))
                        return false;
                    $url = str_replace('{SCOPE}', UrlEncode($this->scope), $url);
                    if(!$this->GetRedirectURI($redirect_uri))
                        return false;
                    $oauth = array(
                        'oauth_callback'=>$redirect_uri,
                    );
                    $options = array(
                        'Resource'=>'OAuth request token',
                        'FailOnAccessError'=>true
                    );
                    $method = strtoupper($this->token_request_method);
                    switch($method)
                    {
                        case 'GET':
                            break;
                        case 'POST':
                            $options['PostValuesInURI'] = true;
                            break;
                        default:
                            $this->error = $method.' is not a supported method to request tokens';
                            break;
                    }
                    if($this->debug)
                        $this->OutputDebug('Send Api Request with method '.$method);
                    if(!$this->SendAPIRequest($url, $method, array(), $oauth, $options, $response))
                        return false;
                    if(strlen($this->access_token_error))
                    {
                        $this->authorization_error = $this->access_token_error;
                        return true;
                    }
                    if(!IsSet($response['oauth_token'])
                        || !IsSet($response['oauth_token_secret']))
                    {
                        $this->authorization_error = 'it was not returned the requested token';
                        return true;
                    }
                    $access_token = array(
                        'value'=>$response['oauth_token'],
                        'secret'=>$response['oauth_token_secret'],
                        'authorized'=>false
                    );
                    if(!$this->StoreAccessToken($access_token))
                        return false;
                }
                if(!$this->GetDialogURL($url))
                    return false;
                $url .= (strpos($url, '?') === false ? '?' : '&').'oauth_token='.$access_token['value'];
                if(!$one_a)
                {
                    if(!$this->GetRedirectURI($redirect_uri))
                        return false;
                    $url .= '&oauth_callback='.UrlEncode($redirect_uri);
                }
                if($this->debug)
                    $this->OutputDebug('Redirecting to OAuth authorize page '.$url);
                $this->Redirect($url);
                $this->exit = true;
                return true;


                break;
            case "2":
                break;
        }

    }

    /**
     * Retrieve the OAuth access token if it was already previously stored by the
     * StoreAccessToken function.
     * @return This function should return 1 if the access token was retrieved successfully.
     * @param $access_token String
     * @param $url String the access token url
     */
    private function GetAccessToken(&$access_token,$url)
    {
        if(!$this->session_started)
        {
            if(!function_exists('session_start'))
                return $this->logger->err('Session variables are not accessible in this PHP environment');
            if(!session_start())
                return($this->logger->err('it was not possible to start the PHP session'));
            $this->session_started = true;
        }
        if(!$this->GetAccessTokenURL($url))
            return false;
        if(IsSet($_SESSION['OAUTH_ACCESS_TOKEN'][$url]))
            $access_token = $_SESSION['OAUTH_ACCESS_TOKEN'][$url];
        else
            $access_token = array();
        return true;
    }

    /**
     * @param $token
     * @param $verifier
     * @return bool
     */
    public function GetRequestToken(&$token, &$verifier)
    {
        $token = (IsSet($_GET['oauth_token']) ? $_GET['oauth_token'] : null);
        $verifier = (IsSet($_GET['oauth_verifier']) ? $_GET['oauth_verifier'] : null);
        return(true);
    }

}