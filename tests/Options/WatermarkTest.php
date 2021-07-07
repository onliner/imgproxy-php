<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class WatermarkTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(float $opacity, ?string $pos, ?int $x, ?int $y, ?float $scale, string $expected): void
    {
        $opt = new Watermark($opacity, $pos, $x, $y, $scale);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider validPositions
     */
    public function testCreatePositions(string $pos): void
    {
        $opt = new Watermark(1, $pos);
        $this->assertSame("wm:1:$pos", (string) $opt);
    }

    /**
     * @dataProvider invalidOpacityData
     */
    public function testCreateFailInvalidOpacity(float $opacity): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid watermark opacity: $opacity");

        new Watermark($opacity);
    }

    public function testCreateFailInvalidPosition(): void
    {
        $pos = 'eu';
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid watermark position: $pos");

        new Watermark(1, $pos);
    }

    public function testCreateFailInvalidScale(): void
    {
        $scale = -0.001;
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid watermark scale: $scale");

        new Watermark(1, 'so', 100, 100, $scale);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0.5, null, null, null, null, 'wm:0.5'],
            [0.5, 're', null, null, null, 'wm:0.5:re'],
            [0.9, null, null, null, 1.1, 'wm:0.9::::1.1'],
            [0.9, 'so', 10, 10, 1.1, 'wm:0.9:so:10:10:1.1'],
        ];
    }

    /**
     * @return array[]
     */
    public function validPositions(): array
    {
        return [
            ['ce'],
            ['no'],
            ['ea'],
            ['so'],
            ['we'],
            ['nowe'],
            ['noea'],
            ['sowe'],
            ['sm'],
            ['fp'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidOpacityData(): array
    {
        return [
            [-0.001],
            [1.0001],
        ];
    }
}
