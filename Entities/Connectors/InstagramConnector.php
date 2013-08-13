<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class InstagramConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class InstagramConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Instagram";
        $this->config['dialog_url']=  'https://api.instagram.com/oauth/authorize/?client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&scope={SCOPE}&response_type=code&state={STATE}';
        $this->config['access_token_url']= 'https://api.instagram.com/oauth/access_token';

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://api.instagram.com/oauth/authorize',
        'access_token_url' => 'https://api.instagram.com/oauth/access_token',
        'infos_url' => 'https://api.instagram.com/v1/users/self',
    );
*/
    /**
     * {@inheritDoc}

    protected $paths = array(
        'identifier' => 'data.id',
        'nickname' => 'data.username',
        'realname' => 'data.full_name',
        'profilepicture' => 'data.profile_picture',
    );*/



}