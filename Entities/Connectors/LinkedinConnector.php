<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class LinkedinConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class LinkedinConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="LinkedIn";
        $this->config['request_token_url']= 'https://api.linkedin.com/uas/oauth/requestToken?scope={SCOPE}';
        $this->config['dialog_url']= 'https://api.linkedin.com/uas/oauth/authenticate';
        $this->config['access_token_url']= 'https://api.linkedin.com/uas/oauth/accessToken';
        $this->config['url_parameters']= true;

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://www.linkedin.com/uas/oauth2/authorization',
        'access_token_url' => 'https://www.linkedin.com/uas/oauth2/accessToken',
        'infos_url' => 'https://api.linkedin.com/v1/people/~:(id,formatted-name,email-address,picture-url)?format=json',
        'csrf' => true,
    );
    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'formattedName',
        'realname' => 'formattedName',
        'email' => 'emailAddress',
        'profilepicture' => 'pictureUrl',
    );*/


}