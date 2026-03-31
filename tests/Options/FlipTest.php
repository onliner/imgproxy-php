<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class FlipTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $horizontal, bool $vertical, string $expected): void
    {
        $opt = new Flip($horizontal, $vertical);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new Flip();
        $this->assertSame('fl:0:0', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, true, 'fl:1:1'],
            [true, false, 'fl:1:0'],
            [false, true, 'fl:0:1'],
            [false, false, 'fl:0:0'],
        ];
    }
}
