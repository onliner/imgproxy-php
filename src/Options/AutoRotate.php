<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class AutoRotate extends AbstractOption
{
    public function __construct(
        private bool $rotate = true,
    ) {}

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'ar';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            (int) $this->rotate,
        ];
    }
}
