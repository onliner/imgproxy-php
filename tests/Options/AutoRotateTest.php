<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class AutoRotateTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $rotate, string $expected): void
    {
        $opt = new AutoRotate($rotate);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new AutoRotate();
        $this->assertSame('ar:1', (string) $opt);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, 'ar:1'],
            [false, 'ar:0'],
        ];
    }
}
