<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class CacheBusterTest extends TestCase
{
    public function testCreate(): void
    {
        $opt = new CacheBuster('v2.5');
        $this->assertSame('cb:v2.5', (string) $opt);
    }

    public function testCreateFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Cache buster cannot be empty');

        new CacheBuster('');
    }
}
