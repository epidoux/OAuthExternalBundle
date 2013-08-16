<?php

namespace Epidoux\OAuthExternalBundle\Factories;

use Epidoux\OAuthExternalBundle\OAuth\OauthClient;
use Epidoux\OAuthExternalBundle\Entities\Connectors\AmazonConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\BitbucketConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\BitlyConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\BoxConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\DailymotionConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\DeviantartConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\DisqusConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\DropboxConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\EventfulConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\EvernoteConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\FacebookConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\FitbitConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\FlickrConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\FoursquareConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\GithubConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\GoogleConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\InstagramConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\OAuth1Connector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\OAuth1aConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\OAuth2Connector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\OdnoklassnikiConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\QqConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\RightSignatureConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\SalesforceConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\ScoopitConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\SensioConnectConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\SinaWeiboConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\StackExchangeConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\StereomoodConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\StockTwitsConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\SurveyMonkeyConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\ThirtySevenSignalsConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\TumblrConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\TwitterConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\VkontaktConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\WindowsLiveConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\WordpressConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\XingConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\YahooConnector;
use Epidoux\OAuthExternalBundle\Entities\Connectors\YandexConnector;

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
        $connector = new "\".$classname();
        //Generate the url redirect path
        $connector->setName($service['name']);
        $connector->setConfig($service);
        $connector->setClient(new OauthClient());

    }

}