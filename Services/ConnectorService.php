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
        if(!empty($oauth_token))
        {
            $auth_verifier = $request->get('oauth_verifier');
            $token = $connector->getService()->getStorage()->retrieveAccessToken(ucfirst($connector->getType()));

            // This was a callback request from twitter, get the token
            $connector->getService()->requestAccessToken(
                $oauth_token,
                $auth_verifier,
                $token->getRequestTokenSecret()
            );
            // Send a request now that we have access token
            $result = json_decode($connector->getService()->request('account/verify_credentials.json'));

            echo 'result: <pre>' . print_r($result, true) . '</pre>';
        } else if (!empty($_GET['go']) && $_GET['go'] == 'go') {
            // extra request needed for oauth1 to request a request token :-)
            $token = $connector->getService()->requestRequestToken();

            $url = $connector->getService()->getAuthorizationUri(array('oauth_token' => $token->getRequestToken()));
            header('Location: ' . $url);
        }

    }



}