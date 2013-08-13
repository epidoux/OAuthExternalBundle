<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class OAuth1aConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class OAuth1aConnector extends AbstractConnector{

    public function __construct()
    {
        $this->config['oauth_version']="1.0a";
    }
}