<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class WidthTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $width, string $expected): void
    {
        $opt = new Width($width);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $width): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid width: $width");

        new Width($width);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 'w:0'],
            [150, 'w:150'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-1],
            [-150],
        ];
    }
}
