<?php

namespace MainlyCode\Zf1WrapperBundle\DependencyInjection;

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
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        if (method_exists(TreeBuilder::class, 'getRootNode')) {
            // Symfony >=5
            $treeBuilder = new TreeBuilder('zf1_wrapper');
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // Symfony <=4
            $treeBuilder = new TreeBuilder();
            $rootNode = $treeBuilder->root('zf1_wrapper');
        }

        $rootNode
            ->children()
            ->scalarNode('bootstrap_path')
            ->info('Relative path to Zend Framework Bootstrap file kernel.root_dir')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
