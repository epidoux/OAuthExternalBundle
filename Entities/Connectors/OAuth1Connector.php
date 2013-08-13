<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class OAuth1Connector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class OAuth1Connector extends AbstractConnector{

    public function __construct()
    {
        $this->config['oauth_version']="1.0";
    }
}