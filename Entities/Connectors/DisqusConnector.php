<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class DisqusConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class DisqusConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Disqus";
        $this->config['dialog_url']= 'https://disqus.com/api/oauth/2.0/authorize/?response_type=code&client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&scope={SCOPE}&state={STATE}';
        $this->config['access_token_url']='https://disqus.com/api/oauth/2.0/access_token/';
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://disqus.com/api/oauth/2.0/authorize/',
        'access_token_url' => 'https://disqus.com/api/oauth/2.0/access_token/',
        'infos_url' => 'https://disqus.com/api/3.0/users/details.json',

        'scope' => 'read',
    );

    protected $paths = array(
        'identifier' => 'response.id',
        'nickname' => 'response.username',
        'realname' => 'response.name',
    );*/

    /**
     * DISQUS unfortunately breaks the spec by using commas instead of spaces
     * to separate scopes

    public function configure()
    {
        if (isset($this->options['scope'])) {
            $this->options['scope'] = str_replace(',', ' ', $this->options['scope']);
        }
    }*/

}