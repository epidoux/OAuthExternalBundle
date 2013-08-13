<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class TumblrConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class TumblrConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Tumblr";
        $this->config['request_token_url']= 'http://www.tumblr.com/oauth/request_token';
        $this->config['dialog_url']= 'http://www.tumblr.com/oauth/authorize';
        $this->config['access_token_url']= 'http://www.tumblr.com/oauth/access_token';
        $this->config['debug']=true;
        $this->config['debug_http']=true;
    }


}