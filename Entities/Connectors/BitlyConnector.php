<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class BitlyConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class BitlyConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Bitly";
        $this->config['request_token_url']='https://bitly.com/oauth/authorize';
        $this->config['access_token_url']='https://api-ssl.bitly.com/oauth/access_token';

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://bitly.com/oauth/authorize',
        'access_token_url' => 'https://api-ssl.bitly.com/oauth/access_token',
        'infos_url' => 'https://api-ssl.bitly.com/v3/user/info?format=json',
    );

    protected $paths = array(
        'identifier' => 'data.login',
        'nickname' => 'data.display_name',
        'realname' => 'data.full_name',
        'profilepicture' => 'data.profile_image',
    );*/

}