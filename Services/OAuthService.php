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
        try{
            $url = $connector->getConfigElement("request_token_url");
            $redirect = $connector->getConfigElement("redirect_uri");
            $this->logger->debug("Requesting token on ".$url." with callback : ".$redirect);

            $request_token = $connector->getClient()->getRequestToken( $url,$redirect);

            echo $connector->getConfigElement('dialog_url').'?oauth_token='.$request_token['oauth_token'];exit;

            if(!empty($request_token)) {
                //access token
                $connector->getClient()->setToken($request_token["oauth_token"],$request_token["oauth_token_secret"]);
                $access_token = $connector->getClient()->getAccessToken($connector->getConfigElement("access_token_url"));
                print_r($access_token);exit;
            } else {
                throw new \OAuthException("Failed fetching request token, response was: " . $connector->getClient()->getLastResponse());
            }
            //prepare data for url
            switch(intval($connector->getConfigElement("oauth_version")))
            {
                case 1:
                    break;
                case 2:
                    break;
            }
        }
        catch(\OAuthException $e)
        {
            $this->logger->err("Failed to request token for ".$connector->getName()." : ".$e->getMessage());
            throw new \Exception("Failed to request token for ".$connector->getName()." because of ".$e->getMessage());
        }
        return $connector->getConfigElement('dialog_url').$request_token['oauth_token_secret'];
    }

    /**
     * Stage 2 of oauth authentification process
     */
    public function getAuthorizeUrl($connector)
    {

    }

}