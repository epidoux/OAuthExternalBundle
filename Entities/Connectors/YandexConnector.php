<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class YandexConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class YandexConnector extends OAuth1Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Yandex";
        $this->config['dialog_url']= 'https://oauth.yandex.ru/authorize';
        $this->config['access_token_url']= 'https://oauth.yandex.ru/token';
    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://oauth.yandex.ru/authorize',
        'access_token_url' => 'https://oauth.yandex.ru/token',
        'infos_url' => 'https://login.yandex.ru/info?format=json',
    );

    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'display_name',
        'realname' => 'real_name',
    );*/

}