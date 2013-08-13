<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class BitbucketConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class BitbucketConnector extends OAuth1aConnector{


    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Bitbucket";
        $this->config['request_token_url']="https://bitbucket.org/!api/1.0/oauth/request_token";
        $this->config['dialog_url']='https://bitbucket.org/!api/1.0/oauth/authenticate';
        $this->config['access_token_url']="https://bitbucket.org/!api/1.0/oauth/access_token";
        $this->config['debug']=false;
        $this->config['debug_http']=true;

    }

   /*

    protected $options = array(
        'authorization_url' => 'https://bitbucket.org/!api/1.0/oauth/request_token?format=yaml',
        'request_token_url' => 'https://bitbucket.org/!api/1.0/oauth/authenticate?format=yaml',
        'access_token_url' => 'https://bitbucket.org/!api/1.0/oauth/access_token?format=yaml',
        'infos_url' => 'https://api.bitbucket.org/1.0/user?format=yaml',
    );

    protected $paths = array(
        'identifier' => 'user.username',
        'nickname' => 'user.username',
        'realname' => 'user.display_name',
        'profilepicture' => 'user.avatar',
    );*/
}