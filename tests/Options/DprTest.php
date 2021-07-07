<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class DprTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $dpr, string $expected): void
    {
        $opt = new Dpr($dpr);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(int $dpr): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid dpr: $dpr");

        new Dpr($dpr);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [1, 'dpr:1'],
            [2, 'dpr:2'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [0],
            [-100500],
        ];
    }
}
