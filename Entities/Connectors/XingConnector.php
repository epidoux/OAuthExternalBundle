<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class XingConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class XingConnector extends OAuth1aConnector{


    public function __construct()
    {
        parent::__construct();
        $this->config['server']="XING";
        $this->config['request_token_url']= 'https://api.xing.com/v1/request_token';
        $this->config['dialog_url']= 'https://api.xing.com/v1/authorize';
        $this->config['access_token_url']= 'https://api.xing.com/v1/access_token';
        $this->config['authorization_header']=false;
        $this->config['debug']=false;
        $this->config['debug_http']=true;
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://api.twitter.com/oauth/authenticate',
        'request_token_url' => 'https://api.twitter.com/oauth/request_token',
        'access_token_url' => 'https://api.twitter.com/oauth/access_token',
        'infos_url' => 'http://api.twitter.com/1.1/account/verify_credentials.json',
    );

    protected $paths = array(
        'identifier' => 'id_str',
        'nickname' => 'screen_name',
        'realname' => 'name',
    );*/
}