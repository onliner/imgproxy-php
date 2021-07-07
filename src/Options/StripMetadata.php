<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class StripMetadata extends Option
{
    /**
     * @var bool
     */
    private $strip;

    public function __construct(bool $strip = true)
    {
        $this->strip = $strip;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'sm';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            (int) $this->strip,
        ];
    }
}
