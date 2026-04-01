<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class MinWidthTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $width, string $expected): void
    {
        $opt = new MinWidth($width);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $width): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid width: $width");

        new MinWidth($width);
    }

    /**
     * @return list<array{int, string}>
     */
    public function validData(): array
    {
        return [
            [0, 'mw:0'],
            [150, 'mw:150'],
        ];
    }

    /**
     * @return list<array{int}>
     */
    public function invalidData(): array
    {
        return [
            [-1],
            [-150],
        ];
    }
}
