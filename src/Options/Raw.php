<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Raw extends AbstractOption
{
    /**
     * @var bool
     */
    private $raw;

    public function __construct(bool $raw = true)
    {
        $this->raw = $raw;
    }

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
