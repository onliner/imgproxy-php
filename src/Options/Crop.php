<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Crop extends AbstractOption
{
    private Width $width;
    private Height $height;
    private ?Gravity $gravity = null;

    public function __construct(int $width, int $height, ?string $gravity = null)
    {
        $this->width = new Width($width);
        $this->height = new Height($height);

        if ($gravity !== null) {
            $this->gravity = Gravity::fromString($gravity);
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'c';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return array_merge(
            $this->width->data(),
            $this->height->data(),
            $this->gravity ? $this->gravity->data() : []
        );
    }
}
