<?php

declare(strict_types=1);

namespace Curler7\TwigBase64ExtensionBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Gunnar Suwe <suwe@smart-media.design>
 */
class Curler7TwigBase64ExtensionExtension extends Extension
{
    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = (new Processor())->processConfiguration(new Configuration(), $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));

        $container->setParameter(
            'curler7_twig_base_64_extension.converter.image_to_base_64_converter',
            $config['converter']['image_to_base_64_converter']
        );

        $container->setParameter(
            'curler7_twig_base_64_extension.twig.base_64_image_extension',
            $config['twig']['base_64_image_extension']
        );

        $loader->load('services.xml');
    }
}