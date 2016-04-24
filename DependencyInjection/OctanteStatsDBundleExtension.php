<?php

namespace Octante\StatsDBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class OctanteStatsDBundleExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('eventDispatchers.yml');
        $loader->load('eventListeners.yml');
        $loader->load('factories.yml');
        $loader->load('services.yml');

        $configuration = new Configuration($container->getParameter('kernel.debug'));
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter($this->getAlias() . '.sender.class', $config['connection']['class']);
        $container->setParameter($this->getAlias() . '.sender.debug_class', $config['connection']['debug_class']);

        foreach ($config['connection'] as $k => $v) {
            $container->setParameter($this->getAlias() . '.connection.' . $k, $v);
        }

        // set the debug sender
        if ($config['connection']['debug']) {
            $senderService = new Definition('%octante_stats_d_bundle.sender.debug_class%');
            $container->setDefinition('octante_stats_d_bundle.sender.service', $senderService);
            $senderService->setArguments(array());
        }
    }
}