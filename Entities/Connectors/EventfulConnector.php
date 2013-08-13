<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class EventfulConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class EventfulConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Eventful";
        $this->config['request_token_url']='http://eventful.com/oauth/request_token';
        $this->config['dialog_url']= 'http://eventful.com/oauth/authorize';
        $this->config['access_token_url']= 'http://eventful.com/oauth/access_token';
        $this->config['authorization_header']=false;
        $this->config['url_parameters']=true;
        $this->config['token_request_method']= 'POST';
    }


}