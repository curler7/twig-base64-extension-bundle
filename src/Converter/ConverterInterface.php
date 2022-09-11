<?php

declare(strict_types=1);

namespace Curler7\TwigBase64ExtensionBundle\Converter;

/**
 * @author Gunnar Suwe <suwe@smart-media.design>
 */
interface ConverterInterface
{
    function convert(string $path): string;
}