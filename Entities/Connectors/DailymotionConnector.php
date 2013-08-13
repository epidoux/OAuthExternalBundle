<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class DailymotionConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class DailymotionConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Dailymotion";
        $this->config['dialog_url']= 'https://api.dailymotion.com/oauth/authorize';
        $this->config['access_token_url']='https://api.dailymotion.com/oauth/token';
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://api.dailymotion.com/oauth/authorize',
        'access_token_url' => 'https://api.dailymotion.com/oauth/token',
        'infos_url' => 'https://api.dailymotion.com/me',

        // @link http://www.dailymotion.com/doc/api/authentication.html#dialog-form-factors
        'display' => null,
    );
    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'screenname',
        'realname' => 'fullname', // requires 'userinfo' scope
        'email' => 'email', // requires 'email' scope
        'profilepicture' => 'avatar_medium_url'
    );*/

}