<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class ExtendAspectRatioTest extends TestCase
{
    /**
     * @dataProvider exampleData
     */
    public function testCreate(bool $extend, ?string $gravity, string $expected): void
    {
        $opt = new ExtendAspectRatio($extend, $gravity);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateDefault(): void
    {
        $opt = new ExtendAspectRatio();
        $this->assertSame('exar:1', (string) $opt);
    }

    /**
     * @dataProvider invalidGravityData
     */
    public function testCreateFail(string $gravity, string $message): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        new ExtendAspectRatio(true, $gravity);
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [true, null, 'exar:1'],
            [false, null, 'exar:0'],
            [true, 'ce', 'exar:1:ce'],
            [false, 'ce:0:0', 'exar:0:ce:0:0'],
            [false, 'ce:200:250', 'exar:0:ce:200:250'],
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
            ['ce:-100:0', 'Invalid gravity X: -100'],
            ['ce:0:-500', 'Invalid gravity Y: -500'],
        ];
    }
}
