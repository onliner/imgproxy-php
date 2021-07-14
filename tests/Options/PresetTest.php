<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class PresetTest extends TestCase
{
    /**
     * @param array<string> $presets
     * @param string $expected
     *
     * @dataProvider validData
     */
    public function testCreate(array $presets, string $expected): void
    {
        $opt = new Preset(...$presets);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('At least one preset must be set');

        new Preset();
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [['default'], 'pr:default'],
            [['blurry', 'square'], 'pr:blurry:square'],
            [['default', '', 'square', '', 'blurry'], 'pr:default:square:blurry'],
        ];
    }
}
