<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

use InvalidArgumentException;

class GravityType
{
    public const
        NORTH = 'no',
        SOUTH = 'so',
        EAST = 'ea',
        WEST = 'we',
        NORTH_EAST = 'noea',
        NORTH_WEST = 'nowe',
        SOUTH_EAST = 'soea',
        SOUTH_WEST = 'sowe',
        CENTER = 'ce',
        SMART = 'sm',
        FOCUS_POINT = 'fp'
    ;

    public const TYPES = [
        self::NORTH,
        self::SOUTH,
        self::EAST,
        self::WEST,
        self::NORTH_EAST,
        self::NORTH_WEST,
        self::SOUTH_EAST,
        self::SOUTH_WEST,
        self::CENTER,
        self::SMART,
        self::FOCUS_POINT,
    ];

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        if (!in_array($type, self::TYPES)) {
            throw new InvalidArgumentException(sprintf('Invalid gravity: %s', $type));
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->type;
    }
}
