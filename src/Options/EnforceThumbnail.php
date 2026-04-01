<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class EnforceThumbnail extends AbstractOption
{
    public function __construct(
        private ?string $format = null,
    ) {}

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'eth';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->format ?: true,
        ];
    }
}
