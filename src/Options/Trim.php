<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;
use Onliner\ImgProxy\Support\Color;

final class Trim extends AbstractOption
{
    /**
     * @var float
     */
    private $threshold;
    /**
     * @var Color|null
     */
    private $color;
    /**
     * @var bool|null
     */
    private $equalHor;
    /**
     * @var bool|null
     */
    private $equalVer;

    public function __construct(float $threshold, string $color = null, bool $equalHor = null, bool $equalVer = null)
    {
        if ($threshold < 0) {
            throw new InvalidArgumentException(sprintf('Invalid threshold: %s', $threshold));
        }

        if ($color !== null) {
            $this->color = Color::fromHex($color);
        }

        $this->threshold = $threshold;
        $this->equalHor = $equalHor;
        $this->equalVer = $equalVer;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 't';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->threshold,
            $this->color ? $this->color->value() : null,
            isset($this->equalHor) ? (int) $this->equalHor : null,
            isset($this->equalVer) ? (int) $this->equalVer : null,
        ];
    }
}
