<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class FlickrConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class FlickrConnector extends OAuth1aConnector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Flickr";
        $this->config['request_token_url']= 'http://www.flickr.com/services/oauth/request_token';
        $this->config['dialog_url']=  'http://www.flickr.com/services/oauth/authorize?perms={SCOPE}';
        $this->config['access_token_url']= 'http://www.flickr.com/services/oauth/access_token';
        $this->config['authorization_header']=false;
    }

    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'http://www.flickr.com/services/oauth/authorize',
        'request_token_url' => 'http://www.flickr.com/services/oauth/request_token',
        'access_token_url' => 'http://www.flickr.com/services/oauth/access_token',

        'perms' => 'read',
    );

    protected $paths = array(
        'identifier' => 'user_nsid',
        'nickname' => 'username',
        'realname' => 'fullname',
    );
    */
    /**
     * {@inheritDoc}
     */
    public function getAuthorizationUrl($redirectUri, array $extraParameters = array())
    {
        $token = $this->getRequestToken($redirectUri, $extraParameters);

        $params = array(
            'oauth_token' => $token['oauth_token'],
            'perms' => $this->getOption('perms'),
            'nojsoncallback' => 1,
        );

        return $this->normalizeUrl($this->getOption('authorization_url'), $params);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserInformation(array $accessToken, array $extraParameters = array())
    {
        $response = $this->getUserResponse();
        $response->setResponse($accessToken);
        $response->setResourceOwner($this);
        $response->setOAuthToken(new OAuthToken($accessToken));

        return $response;
    }
}