<?php

namespace Epidoux\OAuthExternalBundle\Entities;

/**
 * Wrap a connector
 * @version 1.0
 * @author Eric Pidoux <eric.pidoux@gmail.com>
 */
class ConnectorWrapper {

    /**
     * @var String $name : unique name of the connector
     */
    private $name;

    /**
     * @var the service
     */
    private $service;

    /**
     * @var String $type : the service type
     */
    private $type;

    /**
     * @var String $callback_url: the url to callback
     */
    private $callback_url;

    /**
     * @var Array $scopes : the scopes
     */
    private $scopes;

    /**
     * @var int the oauth version used
     */
    private $version;

    /**
     * Constructor
     */
    public function __construct($name,$service,$type,$url,$scopes,$version)
    {
        $this->name= $name;
        $this->service = $service;
        $this->type = $type;
        $this->callback_url = $url;
        $this->scopes = $scopes;
        $this->version = $version;
    }

    /**
     * Return name
     * @return the connector name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Edit the name
     * @param $name String
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Return the service
     * @return the service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Edit the service
     * @param $service the service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * Get the connector type
     * @return $type
     */
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getCallbackUrl()
    {
        return $this->callback_url;
    }

    public function setCallbackUrl($url)
    {
        $this->callback_url = $url;
    }

    public function getScopes()
    {
        return $this->scopes;
    }

    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
    }
    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }
}