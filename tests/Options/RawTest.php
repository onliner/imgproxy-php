<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class RawTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $raw, string $expected): void
    {
        $opt = new Raw($raw);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new Raw();
        $this->assertSame('raw:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, 'raw:1'],
            [false, 'raw:0'],
        ];
    }
}
