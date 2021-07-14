<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class QualityTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $quality, string $expected): void
    {
        $opt = new Quality($quality);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $quality): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid quality: $quality");

        new Quality($quality);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 'q:0'],
            [75, 'q:75'],
            [100, 'q:100'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-10],
            [101],
        ];
    }
}
