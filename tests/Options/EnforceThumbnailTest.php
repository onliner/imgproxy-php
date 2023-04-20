<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class EnforceThumbnailTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(?string $format, string $expected): void
    {
        $opt = new EnforceThumbnail($format);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new EnforceThumbnail();
        $this->assertSame('eth:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            ['', 'eth:1'],
            [null, 'eth:1'],
            ['avif', 'eth:avif'],
            ['heic', 'eth:heic'],
        ];
    }
}
