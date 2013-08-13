<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class SensioConnectConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class SensioConnectConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="SensioConnect";
        $this->config['dialog_url']='https://connect.sensiolabs.com/oauth/authorize';
        $this->config['access_token_url']= 'https://connect.sensiolabs.com/oauth/access_token';
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://connect.sensiolabs.com/oauth/authorize',
        'access_token_url' => 'https://connect.sensiolabs.com/oauth/access_token',
        'infos_url' => 'https://connect.sensiolabs.com/api',

        'user_response_class' => '\HWI\Bundle\OAuthBundle\OAuth\Response\SensioConnectUserResponse',

        'response_type' => 'code',
    );*/
}