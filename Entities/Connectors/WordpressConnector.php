<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class WordpressConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class WordpressConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Wordpress";
        $this->config['dialog_url']='https://public-api.wordpress.com/oauth2/authorize';
        $this->config['access_token_url']= 'https://public-api.wordpress.com/oauth2/token';
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://public-api.wordpress.com/oauth2/authorize',
        'access_token_url' => 'https://public-api.wordpress.com/oauth2/token',
        'infos_url' => 'https://public-api.wordpress.com/rest/v1/me',
    );

    protected $paths = array(
        'identifier' => 'ID',
        'nickname' => 'username',
        'realname' => 'display_name',
        'email' => 'email',
        'profilepicture' => 'avatar_URL',
    );*/
}