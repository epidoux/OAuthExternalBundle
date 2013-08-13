<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class QqConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class QqConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Qq";
        $this->config['dialog_url']=  'https://graph.qq.com/oauth2.0/authorize?format=json';
        $this->config['access_token_url']= 'https://graph.qq.com/oauth2.0/token';

    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://graph.qq.com/oauth2.0/authorize?format=json',
        'access_token_url' => 'https://graph.qq.com/oauth2.0/token',
        'infos_url' => 'https://graph.qq.com/user/get_user_info',
        'me_url' => 'https://graph.qq.com/oauth2.0/me',
    );*/

    /**
     * {@inheritDoc}

    protected $paths = array(
        'identifier' => 'openid',
        'nickname' => 'nickname',
        'realname' => 'nickname',
        'profilepicture' => 'figureurl_qq_1',
    );*/
}