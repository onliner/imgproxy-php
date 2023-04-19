<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class EnforceThumbnail extends AbstractOption
{
    private ?string $format;

    public function __construct(string $format = null)
    {
        $this->format = $format;
    }

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
