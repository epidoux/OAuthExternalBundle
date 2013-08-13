<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class DeviantartConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class DeviantartConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Deviantart";
        $this->config['dialog_url']= 'https://www.deviantart.com/oauth2/draft15/authorize';
        $this->config['access_token_url']='https://www.deviantart.com/oauth2/draft15/token';
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://www.deviantart.com/oauth2/draft15/authorize',
        'access_token_url' => 'https://www.deviantart.com/oauth2/draft15/token',
        'infos_url' => 'https://www.deviantart.com/api/draft15/user/whoami',
    );

    protected $paths = array(
        'identifier' => 'username',
        'nickname' => 'username',
        'profilepicture' => 'usericonurl',
    );
    */
}