<?php

namespace xrow\IVWBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ivw');
        $rootNode
            ->children()
                ->arrayNode('stattags')
                    ->requiresAtLeastOneElement()
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('path')->end()
                            ->arrayNode('tags')
                                ->children()
                                    ->scalarNode('ivw')->end()
                                    ->scalarNode('nedstat')->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
        /*$rootNode
            ->children()
                ->arrayNode('stattags')
                    ->requiresAtLeastOneElement()
                    ->prototype('array')
                        ->children()
                            ->scalarNode('name')
                                ->isRequired()
                            ->end()
                            ->scalarNode('path')
                                ->isRequired()
                            ->end()
                            ->arrayNode('tags')
                                ->isRequired()
                                ->requiresAtLeastOneElement()
                                ->children()
                                    ->scalarNode('ivw')
                                        ->isRequired()
                                    ->end()
                                    ->scalarNode('nedstat')
                                        ->isRequired()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();*/

        return $treeBuilder;
    }
}
