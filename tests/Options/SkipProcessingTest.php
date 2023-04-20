<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class SkipProcessingTest extends TestCase
{
    /**
     * @param array<string> $extensions
     * @param string $expected
     *
     * @dataProvider exampleData
     */
    public function testCreate(array $extensions, string $expected): void
    {
        $opt = new SkipProcessing(...$extensions);
        $this->assertSame($expected, (string) $opt);
    }

    public function testCreateFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('At least one extension must be set');

        new SkipProcessing();
    }

    /**
     * @return array[]
     */
    public function exampleData(): array
    {
        return [
            [['jpg'], 'skp:jpg'],
            [['jpg', 'png'], 'skp:jpg:png'],
            [['jpg', '', 'png', '', 'gif'], 'skp:jpg:png:gif'],
        ];
    }
}
