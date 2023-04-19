<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Enlarge extends AbstractOption
{
    private bool $enlarge;

    public function __construct(bool $enlarge = true)
    {
        $this->enlarge = $enlarge;
    }

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
