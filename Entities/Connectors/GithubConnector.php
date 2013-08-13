<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class GithubConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class GithubConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="github";
        $this->config['dialog_url']=  'https://github.com/login/oauth/authorize?client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&scope={SCOPE}&state={STATE}';
        $this->config['access_token_url']= 'https://github.com/login/oauth/access_token';

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://github.com/login/oauth/authorize',
        'access_token_url' => 'https://github.com/login/oauth/access_token',
        'infos_url' => 'https://api.github.com/user',
    );

    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'login',
        'realname' => 'name',
        'email' => 'email',
        'profilepicture' => 'avatar_url',
    );*/

    /**
     * Github unfortunately breaks the spec by using commas instead of spaces
     * to separate scopes
     */
    public function configure()
    {
        if (isset($this->options['scope'])) {
            $this->options['scope'] = str_replace(',', ' ', $this->options['scope']);
        }
    }

}