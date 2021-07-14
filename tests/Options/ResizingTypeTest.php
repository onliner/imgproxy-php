<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class ResizingTypeTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(string $type, string $expected): void
    {
        $opt = new ResizingType($type);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(string $type): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid resizing type: $type");

        new ResizingType($type);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            ['fit', 'rt:fit'],
            ['fill', 'rt:fill'],
            ['auto', 'rt:auto'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            ['foo'],
            ['bar'],
        ];
    }
}
