<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class FormatQualityTest extends TestCase
{
    /**
     * @param array<string, int> $options
     *
     * @dataProvider validData
     */
    public function testCreate(array $options, string $expected): void
    {
        $opt = new FormatQuality($options);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFailInvalidQuality(int $quality): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid quality: $quality");

        new FormatQuality(['png' => $quality]);
    }

    public function testCreateFailEmptyOptions(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('At least one format quality must be set');

        new FormatQuality([]);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            [['png' => 0], 'fq:png:0'],
            [['png' => 75], 'fq:png:75'],
            [['png' => 100], 'fq:png:100'],
            [['jpg' => 80, 'png' => 90], 'fq:jpg:80:png:90'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidData(): array
    {
        return [
            [-10],
            [101],
        ];
    }
}
