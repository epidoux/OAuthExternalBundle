<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class ThirtySevenSignalsConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class ThirtySevenSignalsConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="ThirtySevenSignals";
        $this->config['dialog_url']='https://launchpad.37signals.com/authorization/new';
        $this->config['access_token_url']= 'https://launchpad.37signals.com/authorization/token';
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://launchpad.37signals.com/authorization/new',
        'access_token_url' => 'https://launchpad.37signals.com/authorization/token',
        'infos_url' => 'https://launchpad.37signals.com/authorization.json',
    );

    protected $paths = array(
        'identifier' => 'identity.id',
        'nickname' => 'identity.email_address',
        'realname' => array('identity.last_name', 'identity.first_name'),
        'email' => 'identity.email_address',
    );*/

}