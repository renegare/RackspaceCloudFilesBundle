<?php

namespace Liuggio\RackspaceCloudFilesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('liuggio_rackspace_cloud_files');


        $rootNode
            ->children()
                ->scalarNode('container_prefix')->defaultValue('')->end()
                ->scalarNode('service_class')->defaultValue('Liuggio\RackspaceCloudFilesBundle\Service\RSCFService')->end()
                ->arrayNode('stream_wrapper')
                    ->children()                
                        ->scalarNode('register')->defaultValue(false)->end()
                        ->scalarNode('protocol_name')->defaultValue('rscf')->end()
                        ->scalarNode('class')->defaultValue('\\Liuggio\\RackspaceCloudFilesStreamWrapper\\StreamWrapper\\RackspaceCloudFilesStreamWrapper')->end()
                    ->end()
                ->end()
                ->arrayNode('auth')
                    ->children()
                        ->scalarNode('authentication_class')->defaultValue('CF_Authentication')->end()
                        ->scalarNode('connection_class')->defaultValue('CF_Connection')->end()
                        ->scalarNode('username')->defaultValue(null)->end()
                        ->scalarNode('api_key')->defaultValue(null)->end()
                        ->scalarNode('account')->defaultValue(null)->end()
                        ->scalarNode('auth_host')->defaultValue(null)->end()
                        ->scalarNode('servicenet')->defaultValue(false)->end()
                        ->scalarNode('host')->defaultValue('https://lon.manage.rackspacecloud.com')->end()
                    ->end()
              ->end();

        return $treeBuilder;
    }
}
