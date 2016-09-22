<?php

namespace FL\QBJSParserBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('qbjs_parser');

        $rootNode
            ->children()
                ->arrayNode('doctrine_classes_and_mappings')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                            ->arrayNode('mappings')->isRequired()->cannotBeEmpty()
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('query_builder_id')->isRequired()->cannotBeEmpty()->end()
                                        ->scalarNode('entity_property')->isRequired()->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}