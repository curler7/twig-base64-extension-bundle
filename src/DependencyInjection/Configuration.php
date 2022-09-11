<?php

declare(strict_types=1);

namespace Curler7\TwigBase64ExtensionBundle\DependencyInjection;

use Curler7\TwigBase64ExtensionBundle\Converter\ImageToBase64Converter;
use Curler7\TwigBase64ExtensionBundle\Twig\Base64ImageExtension;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Gunnar Suwe <suwe@smart-media.design>
 */
class Configuration implements ConfigurationInterface
{
    public const TREE_NAME = 'curler7_twig_base_64_extension';

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::TREE_NAME);
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('converter')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('image_to_base_64_converter')->defaultValue(ImageToBase64Converter::class)->end()
                        ->end()
                    ->end()
                    ->arrayNode('twig')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('base_64_image_extension')->defaultValue(Base64ImageExtension::class)->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}