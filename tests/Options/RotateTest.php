<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class RotateTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $angle, string $expected): void
    {
        $opt = new Rotate($angle);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $angle): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid angle: $angle");

        new Rotate($angle);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 'rot:0'],
            [90, 'rot:90'],
            [180, 'rot:180'],
            [270, 'rot:270'],
            [360, 'rot:360'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-90],
            [-10],
            [100],
        ];
    }
}
