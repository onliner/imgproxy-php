<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class StripColorProfileTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $strip, string $expected): void
    {
        $opt = new StripColorProfile($strip);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new StripColorProfile();
        $this->assertSame('scp:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, 'scp:1'],
            [false, 'scp:0'],
        ];
    }
}
