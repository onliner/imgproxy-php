<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class ResizeTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(string $type, ?int $w, ?int $h, ?bool $enlarge, ?bool $ext, string $expected): void
    {
        $opt = new Resize($type, $w, $h, $enlarge, $ext);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidResizingType
     */
    public function testCreateFailInvalidResizingType(string $type): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid resizing type: $type");

        new Resize($type);
    }

    public function testCreateFailInvalidWidth(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid width: -1");

        new Resize('fill', -1);
    }

    public function testCreateFailInvalidHeight(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid height: -2");

        new Resize('fill', 10, -2);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            ['auto', null, null, null, null, 'rs:auto'],
            ['force', null, null, null, null, 'rs:force'],
            ['fill', null, null, null, null, 'rs:fill'],
            ['fill-down', null, null, null, null, 'rs:fill-down'],
            ['fit', 10, null, null, null, 'rs:fit:10'],
            ['fit', 0, null, null, null, 'rs:fit:0'],
            ['fill', 10, 20, null, null, 'rs:fill:10:20'],
            ['fill-down', 10, 20, null, null, 'rs:fill-down:10:20'],
            ['fit', 10, 0, null, true, 'rs:fit:10:0::1'],
            ['fit', 10, 20, null, true, 'rs:fit:10:20::1'],
            ['fill', 10, 20, false, true, 'rs:fill:10:20:0:1'],
            ['fill-down', 10, 20, false, true, 'rs:fill-down:10:20:0:1'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidResizingType(): array
    {
        return [
            ['foo'],
            ['bar'],
        ];
    }
}
