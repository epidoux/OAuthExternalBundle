<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class FoursquareConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class FoursquareConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Foursquare";
        $this->config['dialog_url']=  'https://foursquare.com/oauth2/authorize?client_id={CLIENT_ID}&scope={SCOPE}&response_type=code&redirect_uri={REDIRECT_URI}&state={STATE}';
        $this->config['access_token_url']= 'https://foursquare.com/oauth2/access_token';

    }
    /**
     * {@inheritDoc}

    protected $options = array(
        'authorization_url' => 'https://foursquare.com/oauth2/authorize',
        'access_token_url' => 'https://foursquare.com/oauth2/access_token',
        'infos_url' => 'https://api.foursquare.com/v2/users/self',

        // @link https://developer.foursquare.com/overview/versioning
        'version' => '20121206',
    );
    protected $paths = array(
        'identifier' => 'response.user.id',
        'nickname' => 'response.user.firstName',
        'realname' => array('response.user.firstName', 'response.user.lastName'),
        'email' => 'response.user.contact.email',
        'profilepicture' => 'response.user.photo',
    );
*/
}