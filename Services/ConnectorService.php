<?php

namespace Epidoux\OAuthExternalBundle\Services;


/**
 * Class ConnectorService which manage the connectors
 * @package Epidoux\OAuthExternalBundle\Managers
 * @author Eric Pidoux
 * @version 1.0
 */
class ConnectorService {

    /**
     * @var the Logger
     */
    private $logger;

    /**
     * @var the connector factory
     */
    private $providerFactory;

    /**
     * @var the Array of connectors
     */
    private $connectors=array();

    /**
     * OAuth constructor
     * @param $services the services available and defined in config file
     * @param $logger the logger service
     * @param $providerFactory the factory of connectors
     * @param $session the session
     * @param $storage String the storage type
     */
    public function __construct($services,$logger,$providerFactory,$session,$storage)
    {
        $this->logger = $logger;
        $this->providerFactory = $providerFactory;

        foreach($services as $name=>$service)
        {
            $connector = $this->providerFactory->createConnector($name,$service,$session,$storage);

            $this->connectors[$name] = $connector;
        }
    }

    /**
     * Return connectors
     * @return array of connectors
     */
    public function getConnectors()
    {
        return $this->connectors;
    }

    /**
     * Return connectors by unique name
     * @param $name string the connector unique name
     * @return the connector instance
     */
    public function getConnector($name)
    {
        return $this->connectors[$name];
    }

    /**
     * Connect to the given connector
     * @param $connector ConnectorWrapper the connector wrapper
     * @param $request the request
     */
    public function connect($connector,$request)
    {
        $auth_token = $request->get('oauth_token');
        if(!empty($auth_token))
        {
            $auth_verifier = $request->get('oauth_verifier');
            $this->logger->debug('Retrieving Token with params: oauth_token=>'.$auth_token." ; oauth_verifier=>".$auth_verifier);
            $token = $connector->getService()->getStorage()->retrieveAccessToken(ucfirst($connector->getType()));

            // This was a callback request from twitter, get the token
            $token = $connector->getService()->requestAccessToken(
                $auth_token,
                $auth_verifier,
                $token->getRequestTokenSecret()
            );
            //TODO
            //TRY TO SAVE ACCESS TOKEN

            // Send a request now that we have access token
            //$result = json_decode($connector->getService()->request('account/verify_credentials.json'));

            $result = json_decode($connector->getService()->request('statuses/user_timeline.json'));
            $return = $result;
        } else{
            // extra request needed for oauth1 to request a request token :-)
            $token = $connector->getService()->requestRequestToken();

            $url = $connector->getService()->getAuthorizationUri(array('oauth_token' => $token->getRequestToken()));
            $return = $url;
        }

        return $return;
    }

    /**
     * Connect to the given connector and execute the api
     * @param $connector ConnectorWrapper the connector wrapper
     * @param $api_request, the api request
     * @return the result or false if user is not linked
     */
    public function api($connector,$api_request=null)
    {
        //TODO request and if error redirect to connect;
        $result = json_decode($connector->getService()->request('statuses/user_timeline.json'))

        return $result;
    }



}