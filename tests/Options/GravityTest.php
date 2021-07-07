<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use PHPUnit\Framework\TestCase;

class GravityTest extends TestCase
{
    /**
     * @param string $type
     * @param float|null $x
     * @param float|null $y
     * @param string $expected
     *
     * @dataProvider validData
     */
    public function testCreate(string $type, ?float $x, ?float $y, string $expected): void
    {
        $opt = new Gravity($type, $x, $y);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidGravityType
     */
    public function testCreateFail(string $type): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid gravity: $type");

        new Gravity($type);
    }

    /**
     * @dataProvider validDataFromString
     */
    public function testCreateFromString(string $string, string $expected): void
    {
        $opt = Gravity::fromString($string);
        $this->assertSame($expected, (string) $opt);
    }

    /**
     * @dataProvider invalidDataFromString
     */
    public function testCreateFromStringFail(string $string, string $message): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        Gravity::fromString($string);
    }

    /**
     * @dataProvider invalidGravityOffset
     */
    public function testCreateFailInvalidOffsetX(float $x): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid gravity X: $x");

        new Gravity('ce', $x);
    }

    /**
     * @dataProvider invalidGravityOffset
     */
    public function testCreateFailInvalidOffsetY(float $y): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid gravity Y: $y");

        new Gravity('ce', 0, $y);
    }

    /**
     * @return array[]
     */
    public function validData(): array
    {
        return [
            ['ce', null, null, 'g:ce'],
            ['fp', 0, 1, 'g:fp:0:1'],
            ['fp', 0.5, null, 'g:fp:0.5'],
            ['fp', null, 0.5, 'g:fp::0.5'],
            ['fp', 0.5, 0.7, 'g:fp:0.5:0.7'],
        ];
    }

    /**
     * @return array[]
     */
    public function validDataFromString(): array
    {
        return [
            ['ce', 'g:ce'],
            ['ce:0.5', 'g:ce:0.5'],
            ['ce:0:0', 'g:ce:0:0'],
            ['ce:0.1:0.5', 'g:ce:0.1:0.5'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidDataFromString(): array
    {
        return [
            ['ce:foo', 'Gravity X should be numeric'],
            ['ce:0,1:0.5', 'Gravity X should be numeric'],
            ['ce:0.1:0,5', 'Gravity Y should be numeric'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidGravityType(): array
    {
        return [
            ['eu'],
            ['foo'],
        ];
    }

    /**
     * @return array[]
     */
    public function invalidGravityOffset(): array
    {
        return [
            [-1],
            [-1.01],
        ];
    }
}
