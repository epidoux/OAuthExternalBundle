<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class EvernoteConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class EvernoteConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Evernote";
        $this->config['request_token_url']= 'https://sandbox.evernote.com/oauth';
        $this->config['dialog_url']= 'https://sandbox.evernote.com/OAuth.action';
        $this->config['access_token_url']= 'https://sandbox.evernote.com/oauth';
        $this->config['authorization_header']=false;
        $this->config['url_parameters']=true;
    }


}