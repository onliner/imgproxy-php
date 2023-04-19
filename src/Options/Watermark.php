<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;
use Onliner\ImgProxy\Support\GravityType;

final class Watermark extends AbstractOption
{
    private const REPLICATE_POSITION = 're';

    /**
     * @var float
     */
    private $opacity;
    /**
     * @var string|null
     */
    private $position;
    /**
     * @var int|null
     */
    private $x;
    /**
     * @var int|null
     */
    private $y;
    /**
     * @var float|null
     */
    private $scale;

    public function __construct(
        float $opacity,
        string $position = null,
        int $x = null,
        int $y = null,
        float $scale = null
    ) {
        if ($opacity < 0 || $opacity > 1) {
            throw new InvalidArgumentException(sprintf('Invalid watermark opacity: %s', $opacity));
        }

        if ($scale < 0) {
            throw new InvalidArgumentException(sprintf('Invalid watermark scale: %s', $scale));
        }

        if ($position !== null && !in_array($position, $this->positions())) {
            throw new InvalidArgumentException(sprintf('Invalid watermark position: %s', $position));
        }

        $this->opacity = $opacity;
        $this->position = $position;
        $this->x = $x;
        $this->y = $y;
        $this->scale = $scale;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'wm';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->opacity,
            $this->position,
            $this->x,
            $this->y,
            $this->scale,
        ];
    }

    /**
     * @return array<string>
     */
    private function positions(): array
    {
        return array_merge(GravityType::TYPES, [self::REPLICATE_POSITION]);
    }
}
