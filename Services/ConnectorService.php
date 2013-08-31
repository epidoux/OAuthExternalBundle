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
     * @param $callback the callback uri
     * @param $debug the debug status
     * @param $logger the logger service
     * @param $providerFactory the factory of connectors
     */
    public function __construct($services,$callback,$debug,$logger,$providerFactory)
    {
        $this->logger = $logger;
        $this->providerFactory = $providerFactory;

        foreach($services as $name=>$service)
        {
            if(empty($callback))$callback = 'http://'.$_SERVER['HTTP_HOST'].
                dirname(strtok($_SERVER['REQUEST_URI'],'?'));
            $service['redirect_uri']= $callback;
            $connector = $this->providerFactory->createConnector($name,$service,$this->logger);
            $connector->getClient()->debug=$debug;

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

}