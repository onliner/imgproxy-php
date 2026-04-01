<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Quality extends AbstractOption
{
    public function __construct(
        public int $quality,
    ) {
        if ($quality < 0 || $quality > 100) {
            throw new InvalidArgumentException(sprintf('Invalid quality: %s', $quality));
        }
    }

    public function quality(): int
    {
        return $this->quality;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'q';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->quality,
        ];
    }
}
