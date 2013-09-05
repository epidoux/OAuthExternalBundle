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
        "bitBucket",
        "bitly",
        "box",
        "dropbox",
        "etsy",
        "facebook",
        "fitBit",
        "foursquare",
        "gitHub",
        "google",
        "instagram",
        "linkedin",
        "microsoft",
        "paypal",
        "soundcloud",
        "tumblr",
        "twitter",
        "vkontakte",
        "yammer"
    );

    private $storagesName = array(
        "session",
        "memory"
    );


    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('epidoux_oauth_external');

       $rootNode
            ->children()
                ->scalarNode('storage')
                    ->validate()
                        ->ifNotInArray($this->storagesName)
                        ->thenInvalid('Unknown storage type "%s".')
                    ->end()
                    ->validate()
                        ->ifTrue(function($v) {
                            return empty($v);
                        })
                        ->thenUnset()
                    ->end()
               ->end()
                ->arrayNode('services')
                    ->isRequired()
                    ->requiresAtLeastOneElement()
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            /*->scalarNode('base_url')->end()
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
                            ->end()*/
                            ->scalarNode('client_id')
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode('client_secret')
                                ->cannotBeEmpty()
                            ->end()
                            /*->scalarNode('scope')
                                ->validate()
                                    ->ifTrue(function($v) {
                                        return empty($v);
                                    })
                                    ->thenUnset()
                                ->end()
                            ->end()*/
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
                            ->scalarNode('callback_url')->end()
                            ->arrayNode('scopes')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('scope')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
