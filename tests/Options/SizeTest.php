<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(?int $w, ?int $h, ?bool $enlarge, ?bool $ext, string $expected): void
    {
        $opt = new Size($w, $h, $enlarge, $ext);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('At least one size argument must be set');

        new Size();
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFailInvalidData(?int $width, ?int $height, string $message): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        new Size($width, $height);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [300, null, null, null, 's:300'],
            [0, null, null, null, 's:0'],
            [0, null, null, true, 's:0:::1'],
            [0, null, null, false, 's:0:::0'],
            [300, 400, null, null, 's:300:400'],
            [300, 0, null, true, 's:300:0::1'],
            [300, 400, null, true, 's:300:400::1'],
            [300, 400, false, true, 's:300:400:0:1'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-1, null, 'Invalid width: -1'],
            [10, -1, 'Invalid height: -1'],
        ];
    }
}
