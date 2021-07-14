<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Sharpen extends Option
{
    /**
     * @var float
     */
    private $sigma;

    public function __construct(float $sigma)
    {
        if ($sigma < 0) {
            throw new InvalidArgumentException(sprintf('Invalid sharpen: %s', $sigma));
        }

        $this->sigma = $sigma;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'sh';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->sigma,
        ];
    }
}
