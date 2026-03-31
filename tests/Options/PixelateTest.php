<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class PixelateTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $size, string $expected): void
    {
        $opt = new Pixelate($size);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $size): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid size: $size");

        new Pixelate($size);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 'pix:0'],
            [10, 'pix:10'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-1],
            [-10],
        ];
    }
}
