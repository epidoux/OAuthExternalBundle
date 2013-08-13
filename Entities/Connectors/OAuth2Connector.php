<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class OAuth2Connector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class OAuth2Connector extends AbstractConnector{


    public function __construct()
    {
        $this->config['oauth_version']="2.0";
    }
}