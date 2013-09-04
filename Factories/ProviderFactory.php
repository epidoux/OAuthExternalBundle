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

    /**
     * Constructor
     */
    public function __construct() {

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
        $connector = new ConnectorWrapper($name,null,$service['type']);
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
            $currentUri->getAbsoluteUri()
        );
        $serviceFactory = new \OAuth\ServiceFactory();
        $serviceFactory->setHttpClient(new CurlClient());
        $client = $serviceFactory->createService($service["type"], $credentials, $storage);

        $connector->setService($client);
        return $connector;
    }

}