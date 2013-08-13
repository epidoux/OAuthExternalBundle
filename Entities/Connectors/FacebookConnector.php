<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class FacebookConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class FacebookConnector extends OAuth2Connector{


    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Facebook";
        $this->config['dialog_url']= 'https://www.facebook.com/dialog/oauth?client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&scope={SCOPE}&state={STATE}';
        $this->config['access_token_url']= 'https://graph.facebook.com/oauth/access_token';

    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://www.facebook.com/dialog/oauth',
        'access_token_url' => 'https://graph.facebook.com/oauth/access_token',
        'revoke_token_url' => 'https://graph.facebook.com/me/permissions',
        'infos_url' => 'https://graph.facebook.com/me',

        // @link https://developers.facebook.com/docs/reference/dialogs/#display
        'display' => null,
    );

    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'username',
        'realname' => 'name',
        'email' => 'email',
    );*/

    /**
     * Facebook unfortunately breaks the spec by using commas instead of spaces
     * to separate scopes
     */
    public function configure()
    {
        if (isset($this->options['scope'])) {
            $this->options['scope'] = str_replace(',', ' ', $this->options['scope']);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorizationUrl($redirectUri, array $extraParameters = array())
    {
        return parent::getAuthorizationUrl($redirectUri, array_merge(array('display' => $this->getOption('display')), $extraParameters));
    }

    /**
     * {@inheritDoc}
     */
    public function revokeToken($token)
    {
        $parameters = array(
            'client_id' => $this->getOption('client_id'),
            'client_secret' => $this->getOption('client_secret'),
        );

        $response = $this->httpRequest($this->normalizeUrl($this->getOption('revoke_token_url'), array('token' => $token)), $parameters, array(), 'POST');
        $response = $this->getResponseContent($response);

        return 'true' == $response;
    }

}