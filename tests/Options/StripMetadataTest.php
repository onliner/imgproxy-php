<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class StripMetadataTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $strip, string $expected): void
    {
        $opt = new StripMetadata($strip);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new StripMetadata();
        $this->assertSame('sm:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, 'sm:1'],
            [false, 'sm:0'],
        ];
    }
}
