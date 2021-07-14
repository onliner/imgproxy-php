<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class CropTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(int $width, int $height, ?string $gravity, string $expected): void
    {
        $opt = new Crop($width, $height, $gravity);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFailInvalidWidth(int $width): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid width: $width");

        new Crop($width, 200);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFailInvalidHeight(int $height): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid height: $height");

        new Crop(0, $height);
    }

    /**
     * @dataProvider invalidGravityData
     */
    public function testCreateFailInvalidGravity(string $gravity, string $message): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        new Crop(100, 100, $gravity);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, 0, null, 'c:0:0'],
            [100, 0, null, 'c:100:0'],
            [100, 200, null, 'c:100:200'],
            [100, 0, 'ce', 'c:100:0:ce'],
            [100, 200, 'ce', 'c:100:200:ce'],
            [100, 200, 'ce:0:0', 'c:100:200:ce:0:0'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-1],
            [-100500],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidGravityData(): array
    {
        return [
            ['foo', 'Invalid gravity: foo'],
            ['ce:bar:0', 'Gravity X should be numeric'],
            ['ce:0:baz', 'Gravity Y should be numeric'],
            ['ce:100:0', 'Invalid gravity X: 100'],
            ['ce:0:500', 'Invalid gravity Y: 500'],
        ];
    }
}
