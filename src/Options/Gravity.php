<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;
use Onliner\ImgProxy\Support\GravityType;

final class Gravity extends Option
{
    /**
     * @var GravityType
     */
    private $type;
    /**
     * @var float|null
     */
    private $x;
    /**
     * @var float|null
     */
    private $y;

    /**
     * @param string $type
     * @param float|null $x
     * @param float|null $y
     */
    public function __construct(string $type, float $x = null, float $y = null)
    {
        $this->type = new GravityType($type);

        if ($x < 0 || $x > 1) {
            throw new InvalidArgumentException(sprintf('Invalid gravity X: %s', $x));
        }

        if ($y < 0 || $y > 1) {
            throw new InvalidArgumentException(sprintf('Invalid gravity Y: %s', $y));
        }

        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param string $gravity
     *
     * @return static
     */
    public static function fromString(string $gravity): self
    {
        $params = explode(':', $gravity, 3);

        if (isset($params[1]) && !is_numeric($params[1])) {
            throw new InvalidArgumentException('Gravity X should be numeric');
        }

        if (isset($params[2]) && !is_numeric($params[2])) {
            throw new InvalidArgumentException('Gravity Y should be numeric');
        }

        return new self(
            $params[0],
            isset($params[1]) ? (float) $params[1] : null,
            isset($params[2]) ? (float) $params[2] : null
        );
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'g';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->type->value(),
            $this->x,
            $this->y,
        ];
    }
}
