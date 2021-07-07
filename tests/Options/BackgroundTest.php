<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class BackgroundTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(string $color, string $expected): void
    {
        $opt = new Background($color);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(string $color): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid color: $color");

        new Background($color);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            ['FFCC00', 'bg:ffcc00'],
            ['255:100:255', 'bg:255:100:255'],
            ['10:20:30', 'bg:10:20:30'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            ['foobar'],
            ['-10:20:30'],
            ['-10:-20:-30'],
            ['100:200:300'],
            ['256:255:100'],
        ];
    }
}
