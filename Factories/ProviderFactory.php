<?php

namespace Epidoux\OAuthExternalBundle\Factories;

use Epidoux\OAuthExternalBundle\OAuth\OauthClient;
use Epidoux\OAuthExternalBundle\Entities\Connectors\*;

/**
 * Class ProviderFactory which creates the providers
 * @package epidoux\OAuthExternalBundle\Factories
 * @author Eric Pidoux
 * @version 1.0
 */
class ProviderFactory {

    private $connectorsName = array(
        "amazon" => "AmazonConnector",
        "bitbucket" => "BitbucketConnector",
        "bitly" => "BitlyConnector",
        "box" => "BoxConnector",
        "dailymotion" => "DailymotionConnector",
        "deviantart" => "DeviantartConnector",
        "disqus" => "DisqusConnector",
        "dropbox" => "DropboxConnector",
        "eventful" => "EventfulConnector",
        "evernote" => "EvernoteConnector",
        "facebook" => "FacebookConnector",
        "fitbit" => "FitbitConnector",
        "flickr" => "FlickrConnector",
        "foursquare" => "FoursquareConnector",
        "github" => "GithubConnector",
        "google" => "GoogleConnector",
        "instagram" => "InstagramConnector",
        "oauth1" => "OAuth1Connector",
        "oauth1a" => "OAuth1aConnector",
        "oauth2" => "OAuth2Connector",
        "odnoklassniki" => "OdnoklassnikiConnector",
        "qq" => "QqConnector",
        "rightsignature" => "RightSignatureConnector",
        "salesforce" => "SalesforceConnector",
        "scoopit" => "ScoopitConnector",
        "sensioconnect" => "SensioConnectConnector",
        "sinaweibo" => "SinaWeiboConnector",
        "stackexchange" => "StackExchangeConnector",
        "stereomood" => "StereomoodConnector",
        "stocktwits" => "StockTwitsConnector",
        "surveymonkey" => "SurveyMonkeyConnector",
        "thirtysevensignals" => "ThirtySevenSignalsConnector",
        "tumblr" => "TumblrConnector",
        "twitter" => "TwitterConnector",
        "vkontakt" => "VkontaktConnector",
        "windowslive" => "WindowsLiveConnector",
        "wordpress" => "WordpressConnector",
        "xing" => "XingConnector",
        "yahoo" => "YahooConnector",
        "yandex" => "YandexConnector"
    );


    /**
     * Constructor
     */
    public function __construct() {

    }

    /**
     * @param $name the unique connector name
     * @param $service array the service
     * @return connector instance
     */
    public function createConnector($name,$service)
    {
        $classname = $this->connectorsName[$service['type']];
        $connector = new $classname();
        //Generate the url redirect path
        $connector->setName($service['name']);
        $connector->setConfig($service);
        $connector->setClient(new OauthClient());

    }

}