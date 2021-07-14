<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class HeightTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $height, string $expected): void
    {
        $opt = new Height($height);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $height): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid height: $height");

        new Height($height);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 'h:0'],
            [150, 'h:150'],
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
