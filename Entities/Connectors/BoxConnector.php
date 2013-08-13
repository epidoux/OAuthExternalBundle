<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class BoxConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class BoxConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Box";
        $this->config['dialog_url']='https://www.box.com/api/oauth2/authorize?response_type=code&client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&state={STATE}';
        $this->config['offline_dialog_url']='https://www.box.com/api/oauth2/authorize?response_type=code&client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&state={STATE}&access_type=offline&approval_prompt=force';
        $this->config['access_token_url']='https://www.box.com/api/oauth2/token';
        $this->config['debug']=true;
        $this->config['debug_http']=true;
        $this->config['offline']=true;
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://www.box.com/api/oauth2/authorize',
        'access_token_url' => 'https://www.box.com/api/oauth2/token',
        'revoke_token_url' => 'https://www.box.com/api/oauth2/revoke',
        'infos_url' => 'https://api.box.com/2.0/users/me',
    );

    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'login',
        'profilepicture' => 'avatar_url'
    );*/

}