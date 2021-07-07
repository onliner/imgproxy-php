<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Height extends Option
{
    /**
     * @var int
     */
    private $height;

    public function __construct(int $height)
    {
        if ($height < 0) {
            throw new InvalidArgumentException(sprintf('Invalid height: %s', $height));
        }

        $this->height = $height;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'h';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->height,
        ];
    }
}
