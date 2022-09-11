<?php

declare(strict_types=1);

namespace Curler7\TwigBase64ExtensionBundle\Tests\Converter;

use Curler7\TwigBase64ExtensionBundle\Converter\ConverterInterface;
use Curler7\TwigBase64ExtensionBundle\Converter\ImageToBase64Converter;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @author Gunnar Suwe <suwe@smart-media.design>
 */
class ImageToBase64ConverterTest extends TestCase
{
    use ProphecyTrait;

    private NormalizerInterface | ObjectProphecy $normalizer;

    private ImageToBase64Converter $converter;

    protected function setUp(): void
    {
        $this->normalizer = $this->prophesize(NormalizerInterface::class);
        $this->converter = new ImageToBase64Converter($this->normalizer->reveal());
        parent::setUp();
    }

    /**
     * @test
     */
    public function converterImplementsFileConverterInterface(): void
    {
        self::assertInstanceOf(ConverterInterface::class, $this->converter);
    }

    /**
     * @test
     */
    public function convertCallsNormalizerWithSplFileObject(): void
    {
        $this->normalizer->normalize(Argument::which('getRealPath', __FILE__))
            ->shouldBeCalled()
            ->willReturn('data:image/gif,[...]');
        $this->converter->convert(__FILE__);
    }
}