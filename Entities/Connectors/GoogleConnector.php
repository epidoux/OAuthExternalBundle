<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class GoogleConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class GoogleConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Google";
        $this->config['dialog_url']=  'https://accounts.google.com/o/oauth2/auth?response_type=code&client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&scope={SCOPE}&state={STATE}';
        $this->config['offline_dialog_url'] = 'https://accounts.google.com/o/oauth2/auth?response_type=code&client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&scope={SCOPE}&state={STATE}&access_type=offline&approval_prompt=force';
        $this->config['access_token_url']= 'https://accounts.google.com/o/oauth2/token';

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://accounts.google.com/o/oauth2/auth',
        'access_token_url' => 'https://accounts.google.com/o/oauth2/token',
        'revoke_token_url' => 'https://accounts.google.com/o/oauth2/revoke',
        'infos_url' => 'https://www.googleapis.com/oauth2/v1/userinfo',

        'scope' => 'https://www.googleapis.com/auth/userinfo.profile',

        // @link https://developers.google.com/accounts/docs/OAuth2WebServer#offline
        'access_type' => null,
        'request_visible_actions' => null,
        // sometimes we need to force for approval prompt (e.g. when we lost refresh token)
        'approval_prompt' => null,
        // Identifying a particular hosted domain account to be accessed (for example, 'mycollege.edu')
        'hd' => null,
    );

    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
        'profilepicture' => 'picture',
    );*/



}