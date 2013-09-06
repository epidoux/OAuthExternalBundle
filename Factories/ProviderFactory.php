<?php

namespace Epidoux\OAuthExternalBundle\Factories;


use Epidoux\OAuthExternalBundle\Entities\ConnectorWrapper;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Http\Client\CurlClient;
use OAuth\Common\Storage\Memory;
use OAuth\Common\Storage\SymfonySession;

/**
 * Class ProviderFactory which creates the providers
 * @package epidoux\OAuthExternalBundle\Factories
 * @author Eric Pidoux
 * @version 1.0
 */
class ProviderFactory {

    private $router;

    /**
     * Constructor
     * @param $router Router sf2
     */
    public function __construct($router) {
        $this->router = $router;
    }

    /**
     * Create connector
     * @param $name the unique connector name
     * @param $service array the service
     * @param $storage_type String the storage type
     * @return connector instance
     */
    public function createConnector($name,$service,$session,$storage_type)
    {
        if(array_key_exists("callback_url",$service) && $service['callback_url']!="")
        {
            $callback_url = $service['callback_url'];
        }
        else{
            $callback_url = $this->router->generate("oauthexternal_connect", array("connectorName"=>$name), true);
        }

        //handle special redirect callback for some services (have to be defined on the service website)
        if($service['type']=="twitter")
        {
            $callback_url = "oob";
        }

        //handle version of oauth by service type
        $version=2;
        if(strtolower($service['type'])=="bitbucket" ||
            strtolower($service['type']) == "etsy" ||
            strtolower($service['type']) == "fitbit" ||
            strtolower($service['type']) == "tumblr" ||
            strtolower($service['type']) == "twitter"
        ) $version = 1;


        $connector = new ConnectorWrapper($name,null,$service['type'],$callback_url,$service['scopes'],$version);
        // Setup the storage
        if($storage_type == "session") $storage = new SymfonySession($session);
        else{
            //memory
            $storage = new Memory();
        }
        $uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
        $currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
        $currentUri->setQuery('');
        // Setup the credentials
        $credentials = new Credentials(
            $service["client_id"],
            $service["client_secret"],
            $callback_url
        );//$currentUri->getAbsoluteUri()
        $serviceFactory = new \OAuth\ServiceFactory();
        //$serviceFactory->setHttpClient(new CurlClient());
        $client = $serviceFactory->createService($service["type"], $credentials, $storage);

        $connector->setService($client);
        return $connector;
    }

    /**
     * Retrieve the auth token from the request
     * @param $request
     * @param $connector the connector
     * @return String the request token
     */
    public function retrieveAuthToken($request,$connector)
    {
        if($connector->getVersion() == 2)
        {
            $result = $request->get('code');
        }
        else{
            //default oauth 1
            $result = $request->get('oauth_token');
        }

        return $result;
    }

}