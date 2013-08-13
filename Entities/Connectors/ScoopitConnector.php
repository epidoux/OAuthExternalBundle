<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class ScoopitConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class ScoopitConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Scoop.it";
        $this->config['request_token_url']='https://www.scoop.it/oauth/request';
        $this->config['dialog_url']= 'https://www.scoop.it/oauth/authorize';
        $this->config['access_token_url']= 'https://www.scoop.it/oauth/access';
        $this->config['authorization_header']= false;
        $this->config['debug']=false;
        $this->config['debug_http']=true;
    }


}