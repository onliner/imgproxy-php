<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class ZoomTest extends TestCase
{
    /**
     * @param float $x
     * @param float|null $y
     * @param string $expected
     *
     * @dataProvider validData
     */
    public function testCreate(float $x, ?float $y, string $expected): void
    {
        $opt = new Zoom($x, $y);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFailInvalidXZoom(float $x): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid zoom X value: $x");

        new Zoom($x);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFailInvalidYZoom(float $x): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid zoom Y value: $x");

        new Zoom(1, $x);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [1, null, 'z:1'],
            [1, 2, 'z:1:2'],
            [1.5, 2, 'z:1.5:2'],
            [1.5, 2.5, 'z:1.5:2.5'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-1],
            [-0.5],
            [0],
        ];
    }
}
