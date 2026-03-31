<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class KeepCopyright extends AbstractOption
{
    public function __construct(
        private bool $keep = true,
    ) {}

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'kcr';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            (int) $this->keep,
        ];
    }
}
