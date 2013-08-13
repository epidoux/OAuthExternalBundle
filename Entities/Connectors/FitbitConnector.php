<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class FitbitConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class FitbitConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Fitbit";
        $this->config['request_token_url']= 'http://api.fitbit.com/oauth/request_token';
        $this->config['dialog_url']= 'http://api.fitbit.com/oauth/authorize';
        $this->config['access_token_url']= 'http://api.fitbit.com/oauth/access_token';
    }


}