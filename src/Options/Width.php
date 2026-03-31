<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Width extends AbstractOption
{
    public function __construct(
        private int $width,
    ) {
        if ($width < 0) {
            throw new InvalidArgumentException(sprintf('Invalid width: %s', $width));
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'w';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->width,
        ];
    }
}
