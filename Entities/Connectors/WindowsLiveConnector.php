<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class WindowsLiveConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class WindowsLiveConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Microsoft";
        $this->config['dialog_url']=  'https://login.live.com/oauth20_authorize.srf?client_id={CLIENT_ID}&scope={SCOPE}&response_type=code&redirect_uri={REDIRECT_URI}&state={STATE}';
        $this->config['access_token_url']= 'https://login.live.com/oauth20_token.srf';
        $this->config['debug']=false;
        $this->config['debug_http']=true;
        $this->config['scope']="wl.basic wl.emails";

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://login.live.com/oauth20_authorize.srf',
        'access_token_url' => 'https://login.live.com/oauth20_token.srf',
        'infos_url' => 'https://apis.live.net/v5.0/me',
    );

    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'emails.account', // requires 'wl.emails' scope
    );*/
}