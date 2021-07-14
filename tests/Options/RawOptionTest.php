<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class RawOptionTest extends TestCase
{
    /**
     * @param string $value
     * @param array<string, mixed> $data
     * @param string $expected
     *
     * @dataProvider exampleData
     */
    public function testCreate(string $value, array $data, string $expected): void
    {
        $opt = new RawOption($value, $data);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            ['ra:cubic', [], 'ra:cubic'],
            ['br', [128], 'br:128'],
        ];
    }
}
