<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class AmazonConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class AmazonConnector extends OAuth2Connector
{


    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Amazon";
        $this->config['request_token_url']="https://www.amazon.com/ap/oa";
        $this->config['access_token_url']="https://www.amazon.com/auth/o2/token";
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://www.amazon.com/ap/oa',
        'access_token_url' => 'https://api.amazon.com/auth/o2/token',
        'infos_url' => 'https://api.amazon.com/user/profile',

        'scope' => 'profile',
    );*/

    /**
     * {@inheritDoc}

    protected $paths = array(
        'identifier' => 'user_id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
    );*/

}