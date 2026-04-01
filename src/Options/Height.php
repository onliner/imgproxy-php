<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Height extends AbstractOption
{
    public function __construct(
        private int $height,
    ) {
        if ($height < 0) {
            throw new InvalidArgumentException(sprintf('Invalid height: %s', $height));
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'h';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->height,
        ];
    }
}
