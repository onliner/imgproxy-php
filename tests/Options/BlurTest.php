<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class BlurTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(float $sigma, string $expected): void
    {
        $opt = new Blur($sigma);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(float $sigma): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid blur: $sigma");

        new Blur($sigma);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 'bl:0'],
            [0.75, 'bl:0.75'],
            [100.500, 'bl:100.5'],
            [100.501, 'bl:100.501'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-0.11],
            [-1234],
        ];
    }
}
