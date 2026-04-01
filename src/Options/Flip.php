<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Flip extends AbstractOption
{
    public function __construct(
        private bool $horizontal = false,
        private bool $vertical = false,
    ) {}

    public function name(): string
    {
        return 'fl';
    }

    public function data(): array
    {
        return [
            (int) $this->horizontal,
            (int) $this->vertical,
        ];
    }
}
