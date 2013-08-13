<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class DropboxConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class DropboxConnector extends OAuth1Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Dropbox";
        $this->config['request_token_url']="https://api.dropbox.com/1/oauth/request_token";
        $this->config['dialog_url']= 'https://www.dropbox.com/1/oauth/authorize';
        $this->config['access_token_url']='https://api.dropbox.com/1/oauth/access_token';
        $this->config['authorization_header']=false;
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://www.dropbox.com/1/oauth2/authorize',
        'access_token_url' => 'https://api.dropbox.com/1/oauth2/token',
        'infos_url' => 'https://api.dropbox.com/1/account/info',
    );

    protected $paths = array(
        'identifier' => 'uid',
        'nickname' => 'email',
        'realname' => 'display_name',
    );
*/
}