<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

use Epidoux\OAuthExternalBundle\OAuth\OauthClient;

/**
 * Class AbstractConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
abstract class AbstractConnector {

    /**
     * @var string name
     */
    protected $name;

    /**
     * @var OAuth $client
     */
    protected $client;

    /**
     * @var token OAuth
     */
    protected $token;

    /**
     * @var array configuration
     */
    protected $config = array(
        "server"=>'',
        "request_token_url"=>"",
        "append_state_to_redirect_uri"=>'',
        "authorization_header"=>true,
        "url_parameters"=>false,
        "token_request_method"=>"GET",
        "signature_method"=>'HMAC-SHA1',
        "oauth_version"=>'',
        "request_token_url"=>"",
        "dialog_url"=>"",
        "access_token_url"=>"",
        "offline_dialog_url"=>"",
        "debug"=>false,
        "debug_http"=>true,
        "offline"=>false,
        "redirect_uri"=>"",
        "client_id"=>"",
        "client_secret"=>"",
        "scope"=>"",
        "api_key"=>""

    );

    /**
     * Return the unique connector's name
     * @return the string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Edit the name
     * @param $name string the name
     */
    public function setName($name)
    {
        $this->name=$name;
    }

    /**
     * Return the client oauth
     * @return the instance
     */
    public function getClient()
    {
        if($this->client == null){
            $this->client = new \OAuth($this->config['client_id'],$this->config['client_secret'],OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_URI);
        }
        return $this->client;
    }

    /**
     * Edit the client
     * @param $client Oauth instance
     */
    public function setClient($client)
    {
        $this->client=$client;
    }

    /**
     * Return the config for the connector
     * @return the array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Return the type of connector (connector name)
     * @return the string
     */
    public function getType()
    {
        return $this->config['server'];
    }

    /**
     * Return config element value
     * @param $key the config array key
     * @return the value of the given key
     */
    public function getConfigElement($key)
    {
        $returned = null;
        if(array_key_exists($key,$this->config)) $returned = $this->config[$key];
        return $returned;
    }

    /**
     * Return config element value
     * @param $key the config array key
     * @param $value the value
     */
    public function setConfigElement($key,$value)
    {
        if(array_key_exists($key,$this->config) && empty($this->config[$key])) $this->config[$key] = $value;
    }

    /**
     * Edit the config
     * @param $config array the config
     */
    public function setConfig($config)
    {
        if($this->config["request_token_url"]=="" && array_key_exists("request_token_url",$config)) $this->config['request_token_url']=$config['request_token_url'];
        if($this->config["dialog_url"]=="" && array_key_exists("dialog_url",$config)) $this->config['dialog_url']=$config['dialog_url'];
        if($this->config["access_token_url"]=="" && array_key_exists("access_token_url",$config)) $this->config['access_token_url']=$config['access_token_url'];
        if($this->config["offline_dialog_url"]=="" && array_key_exists("offline_dialog_url",$config)) $this->config['offline_dialog_url']=$config['offline_dialog_url'];
        if($this->config["redirect_uri"]=="" && array_key_exists("redirect_uri",$config)) $this->config['redirect_uri']=$config['redirect_uri'];
        if(array_key_exists("client_id",$config)) $this->config['client_id']=$config['client_id'];
        if(array_key_exists("client_secret",$config)) $this->config['client_secret']=$config['client_secret'];
        if($this->config["scope"]=="" && array_key_exists("scope",$config)) $this->config['scope']=$config['scope'];
        if($this->config["api_key"]=="" && array_key_exists("api_key",$config)) $this->config['api_key']=$config['api_key'];

        $this->client = new \OAuth($this->config['client_id'],$this->config['client_secret'],OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_URI);
    }

    /**
     * Return the token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Edit token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
}