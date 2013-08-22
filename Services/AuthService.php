<?php

namespace Epidoux\OAuthExternalBundle\Services;


/**
 * Class AuthService which manage the oauth clients
 * @package epidoux\OAuthExternalBundle\Managers
 * @author Eric Pidoux
 * @version 1.0
 * @see tmhOAuth class written by themattharris v.0.8.2
 */
class AuthService {

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
     * @param $logger the logger service
     * @param $providerFactory the factory of connectors
     */
    public function __construct($services,$callback,$logger,$providerFactory)
    {
        $this->logger = $logger;
        $this->providerFactory = $providerFactory;

        foreach($services as $name=>$service)
        {
            $connector = $this->providerFactory->createConnector($name,$service);
            if(!empty($callback))
            {
                $connector->setConfigElement('redirect_uri',$callback);
            }
            else
            {
                $url = 'http://'.$_SERVER['HTTP_HOST'].
                    dirname(strtok($_SERVER['REQUEST_URI'],'?'));

                $connector->setConfigElement('redirect_uri',$url);
            }

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
     * Process to the authentification of the connector
     * @param $connector Object connector instance
     * @return true or client error
     */
    public function processAuthentification($connector)
    {
        $returned_state = true;
        try{
            //generate redirect_uri
            $connector->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].
                dirname(strtok($_SERVER['REQUEST_URI'],'?'));

            if(strlen($connector->getConfigElement("client_id")) == 0
            || strlen($connector->getConfigElement("client_secret")) == 0){
                $this->logger->err("Error while processing authentification of the connector named ".$connector->getName()." : The client id and secret must be set");
                $returned_state = false;
            }
            else
            {
                if(($returned_state = $connector->getClient()->initialize($connector->getConfig())))
                {
                    if(($returned_state = $connector->getClient()->Process()))
                    {
                        if(strlen($connector->getClient()->access_token))
                        {
                            $user = "";
                            $connector->getClient()->CallAPI('https://api.twitter.com/1.1/account/verify_credentials.json',
                                'GET', array(), array('FailOnAccessError'=>true), $user);
                            print_r($user);exit;
                        }
                        else throw new \Exception("Can't access authentification token");
                    }
                    else throw new \Exception("Can't process client authentification");
                    $returned_state = $connector->getClient()->Finalize($returned_state);
                }
                else throw new \Exception("Can't initialize process authentification");
            }
            if(!$returned_state){
                $returned_state = $connector->getClient()->error;
                $this->logger->err("Returned state for authentification process is negative : ".$connector->getClient()->error);
            }
        }
        catch(\Exception $e)
        {
            $this->logger->err("An exception was throwed while processing authentification: ".$e->getMessage(),$e);
        }

        return $returned_state;

    }





}