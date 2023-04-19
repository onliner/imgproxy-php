<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Rotate extends AbstractOption
{
    /**
     * @var int
     */
    private $angle;

    public function __construct(int $angle)
    {
        if ($angle < 0 || $angle % 90 !== 0) {
            throw new InvalidArgumentException(sprintf('Invalid angle: %s', $angle));
        }

        $this->angle = $angle;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'rot';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->angle,
        ];
    }
}
