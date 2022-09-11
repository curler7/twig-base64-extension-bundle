<?php

declare(strict_types=1);

namespace Curler7\TwigBase64ExtensionBundle\Twig;

use Curler7\TwigBase64ExtensionBundle\Converter\ConverterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * @author Gunnar Suwe <suwe@smart-media.design>
 */
class Base64ImageExtension extends AbstractExtension
{
    public function __construct(
        protected ConverterInterface $fileConverter
    ) {}

    public function getFilters(): array
    {
        return [
            new TwigFilter('base64', [$this, 'createBase64Image']),
        ];
    }

    public function createBase64Image(string $image): string
    {
        return $this->fileConverter->convert($image);
    }
}