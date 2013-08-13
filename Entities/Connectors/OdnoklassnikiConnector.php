<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class OdnoklassnikiConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class OdnoklassnikiConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Odnoklassniki";
        $this->config['dialog_url']=  'http://www.odnoklassniki.ru/oauth/authorize';
        $this->config['access_token_url']= 'http://api.odnoklassniki.ru/oauth/token.do';

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'http://www.odnoklassniki.ru/oauth/authorize',
        'access_token_url' => 'http://api.odnoklassniki.ru/oauth/token.do',
        'infos_url' => 'http://api.odnoklassniki.ru/fb.do?method=users.getCurrentUser',

        'application_key' => null,
    );

    protected $paths = array(
        'identifier' => 'uid',
        'nickname' => 'username',
        'realname' => 'name',
    );*/
}