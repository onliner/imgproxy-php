<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class MinHeight extends Option
{
    /**
     * @var Height
     */
    private $height;

    public function __construct(int $height)
    {
        $this->height = new Height($height);
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'mh';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return $this->height->data();
    }
}
