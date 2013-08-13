<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class YahooConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class YahooConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Yahoo";
        $this->config['request_token_url']= 'https://api.login.yahoo.com/oauth/v2/get_request_token';
        $this->config['dialog_url']= 'https://api.login.yahoo.com/oauth/v2/request_auth';
        $this->config['access_token_url']= 'https://api.login.yahoo.com/oauth/v2/get_token';
        $this->config['authorization_header']=false;
        $this->config['debug']=false;
        $this->config['debug_http']=true;
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://api.login.yahoo.com/oauth/v2/request_auth',
        'request_token_url' => 'https://api.login.yahoo.com/oauth/v2/get_request_token',
        'access_token_url' => 'https://api.login.yahoo.com/oauth/v2/get_token',
        'infos_url' => 'http://social.yahooapis.com/v1/user/{guid}/profile',

        'realm' => 'yahooapis.com',
    );

    protected $paths = array(
        'identifier' => 'profile.guid',
        'nickname' => 'profile.nickname',
        'realname' => 'profile.givenName',
    );*/

}