<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class SalesforceConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class SalesforceConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="Salesforce";
        $this->config['dialog_url']= 'https://login.salesforce.com/services/oauth2/authorize?response_type=code&client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&scope={SCOPE}&state={STATE}';
        $this->config['access_token_url']= 'https://login.salesforce.com/services/oauth2/token';
        $this->config['default_access_token_type']="Bearer";
        $this->config['store_access_token_response']= true;
        $this->config['debug']=true;
        $this->config['debug_http']=true;
    }


}