<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Size extends AbstractOption
{
    private ?Width $width = null;
    private ?Height $height = null;
    private ?bool $enlarge;
    private ?bool $extend;

    public function __construct(int $width = null, int $height = null, bool $enlarge = null, bool $extend = null)
    {
        if (is_null($width ?? $height ?? $enlarge ?? $extend)) {
            throw new InvalidArgumentException('At least one size argument must be set');
        }

        if (isset($width)) {
            $this->width = new Width($width);
        }

        if (isset($height)) {
            $this->height = new Height($height);
        }

        $this->enlarge = $enlarge;
        $this->extend = $extend;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 's';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->width ? $this->width->data()[0] : null,
            $this->height ? $this->height->data()[0]: null,
            isset($this->enlarge) ? (int) $this->enlarge : null,
            isset($this->extend) ? (int) $this->extend : null,
        ];
    }
}
