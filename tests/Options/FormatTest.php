<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{
    public function testCreate(): void
    {
        $opt = new Format('jpg');
        $this->assertSame('f:jpg', (string) $opt);
    }

    public function testCreateFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Format cannot be empty');

        new Format('');
    }
}
