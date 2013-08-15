<?php

namespace Epidoux\OAuthExternalBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

    private $connectorsName = array(
        "amazon",
        "bitbucket",
        "bitly",
        "box",
        "dailymotion",
        "deviantart",
        "disqus",
        "dropbox",
        "eventful",
        "evernote",
        "facebook",
        "fitbit",
        "flickr",
        "foursquare",
        "github",
        "google",
        "instagram",
        "oauth1",
        "oauth1a",
        "oauth2",
        "odnoklassniki",
        "qq",
        "rightsignature",
        "salesforce",
        "scoopit",
        "sensioconnect",
        "sinaweibo",
        "stackexchange",
        "stereomood",
        "stocktwits",
        "surveymonkey",
        "thirtysevensignals",
        "tumblr",
        "twitter",
        "vkontakt",
        "windowslive",
        "wordpress",
        "xing",
        "yahoo",
        "yandex"
    );


    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('epidoux_oauth');

        $rootNode
            ->children()
                ->scalarNode('callback_url')->isRequired()->end()
                ->arrayNode('services')
                    ->isRequired()
                    ->requiresAtLeastOneElement()
                    ->useAttributeAsKey('name')
                        ->children()
                            ->scalarNode('base_url')->end()
                            ->scalarNode('access_token_url')
                                ->validate()
                                    ->ifTrue(function($v) {
                                        return empty($v);
                                    })
                                    ->thenUnset()
                                ->end()
                            ->end()
                            ->scalarNode('offline_dialog_url')
                                ->validate()
                                ->ifTrue(function($v) {
                                    return empty($v);
                                })
                                ->thenUnset()
                                ->end()
                            ->end()
                            ->scalarNode('dialog_url')
                                ->validate()
                                    ->ifTrue(function($v) {
                                        return empty($v);
                                    })
                                    ->thenUnset()
                                ->end()
                            ->end()
                            ->scalarNode('request_token_url')
                                ->validate()
                                    ->ifTrue(function($v) {
                                        return empty($v);
                                    })
                                    ->thenUnset()
                                ->end()
                            ->end()
                            ->scalarNode('client_id')
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode('client_secret')
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode('scope')
                                ->validate()
                                    ->ifTrue(function($v) {
                                        return empty($v);
                                    })
                                    ->thenUnset()
                                ->end()
                            ->end()
                            ->scalarNode('type')
                                ->validate()
                                    ->ifNotInArray($this->connectorsName)
                                    ->thenInvalid('Unknown resource owner type "%s".')
                                ->end()
                                ->validate()
                                    ->ifTrue(function($v) {
                                        return empty($v);
                                    })
                                    ->thenUnset()
                                ->end()
                            ->end()

                        ->end()
                ->end()
            ->end();

        return $treeBuilder->buildTree();
    }
}
