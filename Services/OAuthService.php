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
        $url = $connector->getConfigElement("request_token_url");
        $redirect = $connector->getConfigElement("redirect_uri");
        $request_token = $connector->getClient()->getRequestToken( $url, $redirect );
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

}