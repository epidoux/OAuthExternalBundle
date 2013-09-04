<?php

namespace Epidoux\OAuthExternalBundle\Entities;

/**
 * Wrap a connector
 * @version 1.0
 * @author Eric Pidoux <eric.pidoux@gmail.com>
 */
class ConnectorWrapper {

    private $name;

    private $service;

    private $type;

    /**
     * Constructor
     */
    public function __construct($name,$service,$type)
    {
        $this->name= $name;
        $this->service = $service;
        $this->type = $type;
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
     * @return $
     */
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}