<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class ExtendAspectRatio extends AbstractOption
{
    private Extend $extend;

    public function __construct(bool $extend = true, string $gravity = null)
    {
        $this->extend = new Extend($extend, $gravity);
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'exar';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return $this->extend->data();
    }
}
