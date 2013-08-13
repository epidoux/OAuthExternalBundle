<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class SinaWeiboConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class SinaWeiboConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="SinaWeibo";
        $this->config['dialog_url']='https://api.weibo.com/oauth2/authorize';
        $this->config['access_token_url']= 'https://api.weibo.com/oauth2/access_token';
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://api.weibo.com/oauth2/authorize',
        'access_token_url' => 'https://api.weibo.com/oauth2/access_token',
        'revoke_token_url' => 'https://api.weibo.com/oauth2/revokeoauth2',
        'infos_url' => 'https://api.weibo.com/2/users/show.json',
    );

    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'screen_name',
        'realname' => 'screen_name',
        'profilepicture' => 'profile_image_url',
    );*/
}