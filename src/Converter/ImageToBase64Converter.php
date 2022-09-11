<?php

declare(strict_types=1);

namespace Curler7\TwigBase64ExtensionBundle\Converter;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;

/**
 * @author Gunnar Suwe <suwe@smart-media.design>
 */
class ImageToBase64Converter implements ConverterInterface
{
    public function __construct(
        protected DataUriNormalizer $dataUriNormalizer
    ) {}

    /**
     * @throws ExceptionInterface
     */
    public function convert(string $path): string
    {
        return (string) $this->dataUriNormalizer->normalize(new \SplFileObject($path));
    }
}