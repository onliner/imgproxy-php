<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

use PHPUnit\Framework\TestCase;

class GravityTypeTest extends TestCase
{
    /**
     * @dataProvider validData
     */
    public function testCreate(string $type): void
    {
        $gravity = new GravityType($type);
        $this->assertSame($type, $gravity->value());
    }

    /**
     * @dataProvider invalidData
     */
    public function testCreateFail(string $type): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid gravity: $type");

        new GravityType($type);
    }

    /**
     * @return array<array<string>>
     */
    public function validData(): array
    {
        return [
            ['ce'],
            ['no'],
            ['ea'],
            ['so'],
            ['we'],
            ['nowe'],
            ['noea'],
            ['sowe'],
            ['sm'],
            ['fp'],
        ];
    }

    /**
     * @return array<array<string>>
     */
    public function invalidData(): array
    {
        return [
            ['eu'],
            ['foo'],
            ['bar'],
        ];
    }
}
