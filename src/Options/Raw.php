<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Raw extends AbstractOption
{
    public function __construct(
        private bool $raw = true,
    ) {}

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'raw';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            (int) $this->raw,
        ];
    }
}
