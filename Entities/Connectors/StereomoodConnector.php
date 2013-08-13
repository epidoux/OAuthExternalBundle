<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class StereomoodConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class StereomoodConnector extends OAuth1Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Stereomood";
        $this->config['request_token_url']='http://www.stereomood.com/api/oauth/authenticate';
        $this->config['dialog_url']= 'http://www.stereomood.com/api/oauth/request_token';
        $this->config['access_token_url']= 'http://www.stereomood.com/api/oauth/access_token';

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'http://www.stereomood.com/api/oauth/authenticate',
        'request_token_url' => 'http://www.stereomood.com/api/oauth/request_token',
        'access_token_url' => 'http://www.stereomood.com/api/oauth/access_token',
    );

    protected $paths = array(
        'identifier' => 'oauth_token',
        'nickname' => 'oauth_token'
    );*/

}