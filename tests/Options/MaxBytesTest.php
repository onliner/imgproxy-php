<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class MaxBytesTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $bytes, string $expected): void
    {
        $opt = new MaxBytes($bytes);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $bytes): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid max bytes: $bytes");

        new MaxBytes($bytes);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 'mb:0'],
            [1024, 'mb:1024'],
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
