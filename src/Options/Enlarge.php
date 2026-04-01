<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Enlarge extends AbstractOption
{
    public function __construct(
        private bool $enlarge = true,
    ) {}

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'el';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            (int) $this->enlarge,
        ];
    }
}
