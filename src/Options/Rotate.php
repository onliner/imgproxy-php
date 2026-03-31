<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Rotate extends AbstractOption
{
    public function __construct(
        private int $angle,
    ) {
        if ($angle < 0 || $angle % 90 !== 0) {
            throw new InvalidArgumentException(sprintf('Invalid angle: %s', $angle));
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'rot';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->angle,
        ];
    }
}
