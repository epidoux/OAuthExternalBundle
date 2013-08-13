<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class RightSignatureConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class RightSignatureConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="RightSignature";
        $this->config['request_token_url']= 'https://rightsignature.com/oauth/request_token';
        $this->config['dialog_url']= 'https://rightsignature.com/oauth/authorize';
        $this->config['access_token_url']= 'https://rightsignature.com/oauth/access_token';
        $this->config['authorization_header']=false;
        $this->config['debug']=false;
        $this->config['debug_http']=true;
    }


}