<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Pixelate extends AbstractOption
{
    public function __construct(
        private int $size,
    ) {
        if ($size < 0) {
            throw new InvalidArgumentException(sprintf('Invalid size: %s', $size));
        }
    }

    public function name(): string
    {
        return 'pix';
    }

    public function data(): array
    {
        return [
            $this->size,
        ];
    }
}
