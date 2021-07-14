<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

use PHPUnit\Framework\TestCase;

class ImageFormatTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(string $ext): void
    {
        $format = new ImageFormat($ext);
        $this->assertTrue($format->isEquals($ext));
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(string $ext): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid image format: $ext");

        new ImageFormat($ext);
    }

    public function testIsEquals(): void
    {
        $format = new ImageFormat('PNG');
        $this->assertTrue($format->isEquals(' png '));
        $this->assertTrue($format->isEquals(' PNG '));
    }

    /**
     * @return array<array<string>>
     */
    public function validData(): array
    {
        return [
            ['png'],
            ['jpg'],
            ['webp'],
            ['avif'],
            ['gif'],
            ['ico'],
            ['svg'],
            ['heic'],
            ['bmp'],
            ['tiff'],
            ['pdf'],
            ['mp4'],
        ];
    }

    /**
     * @return array<array<string>>
     */
    public function invalidData(): array
    {
        return [
            ['exe'],
            ['php'],
        ];
    }
}
