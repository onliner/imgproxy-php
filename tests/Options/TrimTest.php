<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class TrimTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(float $t, ?string $color, ?bool $equalHor, ?bool $equalVer, string $expected): void
    {
        $opt = new Trim($t, $color, $equalHor, $equalVer);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidColorData
     */
    public function testCreateFailInvalidColor(string $color): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid color: $color");

        new Trim(1.25, $color);
    }

    /**
     * @dataProvider invalidThresholdData
     */
    public function testCreateFailInvalidThreshold(float $threshold): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid threshold: $threshold");

        new Trim($threshold);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [0, null, null, true, 't:0:::1'],
            [1, null, null, null, 't:1'],
            [1, 'FFCC00', null, null, 't:1:ffcc00'],
            [1.2, 'ffcc00', false, true, 't:1.2:ffcc00:0:1'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidColorData(): array
    {
        return [
            ['ffcc'],
            ['ffcc001'],
            ['128:128:128'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidThresholdData(): array
    {
        return [
            [-0.1],
            [-150],
        ];
    }
}
