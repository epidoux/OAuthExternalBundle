<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class SurveyMonkeyConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class SurveyMonkeyConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="SurveyMonkey";
        $this->config['dialog_url']='https://api.surveymonkey.net/oauth/authorize?client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&response_type=code&state={STATE}&api_key={API_KEY}';
        $this->config['access_token_url']= 'https://api.surveymonkey.net/oauth/token?api_key={API_KEY}';
        $this->config['get_token_with_api_key'] = true;
        $this->config['debug']=false;
        $this->config['debug_http']=true;
    }


}