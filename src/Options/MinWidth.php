<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class MinWidth extends AbstractOption
{
    private Width $width;

    public function __construct(int $width)
    {
        $this->width = new Width($width);
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'mw';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return $this->width->data();
    }
}
