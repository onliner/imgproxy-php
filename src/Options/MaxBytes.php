<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class MaxBytes extends AbstractOption
{
    private int $bytes;

    public function __construct(int $bytes)
    {
        if ($bytes < 0) {
            throw new InvalidArgumentException(sprintf('Invalid max bytes: %s', $bytes));
        }

        $this->bytes = $bytes;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'mb';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->bytes,
        ];
    }
}
