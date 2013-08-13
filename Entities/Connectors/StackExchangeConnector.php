<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class StackExchangeConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class StackExchangeConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="StackExchange";
        $this->config['dialog_url']='https://stackexchange.com/oauth';
        $this->config['access_token_url']= 'https://stackexchange.com/oauth/access_token';
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://stackexchange.com/oauth',
        'access_token_url' => 'https://stackexchange.com/oauth/access_token',
        'infos_url' => 'https://api.stackexchange.com/2.0/me',

        'scope' => 'no_expiry',
    );

    protected $paths = array(
        'identifier' => 'user_id',
        'nickname' => 'display_name',
        'realname' => 'display_name',
        'profilepicture' => 'profile_image',
    );*/
}