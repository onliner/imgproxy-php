<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class PaddingTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(?int $top, ?int $right, ?int $bottom, ?int $left, string $expected): void
    {
        $opt = new Padding($top, $right, $bottom, $left);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('At least one dimension must be set');

        new Padding();
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [100, null, null, null, 'pd:100'],
            [100, null, null, 200, 'pd:100:::200'],
            [1, 2, 3, 4, 'pd:1:2:3:4'],
        ];
    }
}
