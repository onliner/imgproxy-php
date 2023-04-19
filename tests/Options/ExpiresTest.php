<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class ExpiresTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(int $timestamp, string $expected): void
    {
        $opt = new Expires($timestamp);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [0, 'exp:0'],
            [-42, 'exp:-42'],
            [100500, 'exp:100500'],
        ];
    }
}
