<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(string $string): void
    {
        $color = new Color($string);
        $this->assertSame(strtolower($string), $color->value());
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(string $string): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid color: $string");

        new Color($string);
    }

    public function testCreateFromHex(): void
    {
        $color = Color::fromHex('ffcc00');
        $this->assertSame('ffcc00', $color->value());
    }

    public function testCreateFailFromHex(): void
    {
        $color = '255:255:128';
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid color: $color");

        Color::fromHex($color);
    }

    /**
     * @return array<array<string>>
     */
    public function validData(): array
    {
        return [
            ['ffcc00'],
            ['EBf0f4'],
            ['255:255:128'],
            ['10:20:30'],
        ];
    }

    /**
     * @return array<array<string>>
     */
    public function invalidData(): array
    {
        return [
            ['ffcc00aa'],
            ['255:100'],
            ['-10:20:30'],
            ['-10:-20:-30'],
            ['1000:255:256'],
        ];
    }
}
