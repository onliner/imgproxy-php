<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use Onliner\ImgProxy\Support\Color;

final class Background extends AbstractOption
{
    private Color $color;

    public function __construct(string $color)
    {
        $this->color = new Color($color);
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'bg';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->color->value(),
        ];
    }
}
