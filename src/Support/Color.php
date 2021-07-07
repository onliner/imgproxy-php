<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

use InvalidArgumentException;

class Color
{
    /**
     * @var string
     */
    private $color;

    /**
     * @param string $color
     */
    public function __construct(string $color)
    {
        if (!$this->isValidHexColor($color) && !$this->isValidRgbColor($color)) {
            throw new InvalidArgumentException(sprintf('Invalid color: %s', $color));
        }

        $this->color = strtolower($color);
    }

    /**
     * @param string $color
     *
     * @return self
     */
    public static function fromHex(string $color): self
    {
        if (!self::isValidHexColor($color)) {
            throw new InvalidArgumentException(sprintf('Invalid color: %s', $color));
        }

        return new self($color);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     *
     * @return bool
     */
    private static function isValidHexColor(string $color): bool
    {
        return (bool) preg_match('/^[a-f0-9]{6}$/i', $color);
    }

    /**
     * @param string $color
     *
     * @return bool
     */
    private static function isValidRgbColor(string $color): bool
    {
        $rgb = explode(':', $color);

        return count($rgb) == 3 && ctype_digit(implode($rgb)) && max($rgb) <= 255;
    }
}
