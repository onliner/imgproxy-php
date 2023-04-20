<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class ReturnAttachmentTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $value, string $expected): void
    {
        $opt = new ReturnAttachment($value);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new ReturnAttachment();
        $this->assertSame('att:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, 'att:1'],
            [false, 'att:0'],
        ];
    }
}
