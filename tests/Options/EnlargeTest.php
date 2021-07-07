<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class EnlargeTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $enlarge, string $expected): void
    {
        $opt = new Enlarge($enlarge);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new Enlarge();
        $this->assertSame('el:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, 'el:1'],
            [false, 'el:0'],
        ];
    }
}
