<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class KeepCopyrightTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $keep, string $expected): void
    {
        $opt = new KeepCopyright($keep);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new KeepCopyright();
        $this->assertSame('kcr:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, 'kcr:1'],
            [false, 'kcr:0'],
        ];
    }
}
