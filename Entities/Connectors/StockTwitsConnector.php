<?php

namespace Epidoux\OAuthExternalBundle\Entities\Connectors;

/**
 * Class StockTwitsConnector
 * @package Epidoux\OAuthExternalBundle\Entities
 * @version 1.0
 */
class StockTwitsConnector extends OAuth2Connector{

    public function __construct()
    {
        parent::__construct();
        $this->config['server']="StockTwits";
        $this->config['dialog_url']= 'https://api.stocktwits.com/api/2/oauth/authorize?client_id={CLIENT_ID}&response_type=code&redirect_uri={REDIRECT_URI}&scope={SCOPE}&state={STATE}';
        $this->config['access_token_url']= 'https://api.stocktwits.com/api/2/oauth/token';

        $this->config['debug']=true;
        $this->config['debug_http']=true;
    }


}