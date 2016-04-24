<?php

namespace Octante\StatsDBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    private $debug;

    public function __construct($debug)
    {
        $this->debug = $debug;
    }

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('octante_stats_d');

        $rootNode
            ->children()
                ->arrayNode('connection')
                    ->children()
                        ->scalarNode("class")->defaultValue('Liuggio\StatsdClient\Sender\SocketSender')->end()
                        ->scalarNode("debug_class")->defaultValue('Liuggio\StatsdClient\Sender\SysLogSender')->end()
                        ->scalarNode("debug")->defaultValue($this->debug)->end()
                        ->scalarNode("port")->defaultValue(8125)->end()
                        ->scalarNode("host")->defaultValue("localhost")->end()
                        ->scalarNode("reduce_packet")->defaultValue(true)->end()
                        ->scalarNode("protocol")->defaultValue("udp")->end()
                        ->scalarNode("fail_silently")->defaultValue(true)->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}