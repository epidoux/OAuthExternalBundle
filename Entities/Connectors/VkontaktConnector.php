<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class VkontaktConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class VkontaktConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Vkontakt";
        $this->config['dialog_url']='https://oauth.vk.com/authorize';
        $this->config['access_token_url']= 'https://oauth.vk.com/access_token';
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://oauth.vk.com/authorize',
        'access_token_url' => 'https://oauth.vk.com/access_token',
        'infos_url' => 'https://api.vk.com/method/getUserInfoEx',
    );

    protected $paths = array(
        'identifier' => 'response.user_id',
        'nickname' => 'response.user_name',
        'realname' => 'response.user_name',
    );*/

    /**
     * Vkontakte unfortunately breaks the spec by using commas instead of spaces
     * to separate scopes

    public function configure()
    {
        if (isset($this->options['scope'])) {
            $this->options['scope'] = str_replace(',', ' ', $this->options['scope']);
        }
    }*/

}