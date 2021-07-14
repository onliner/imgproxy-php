<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class CacheBuster extends Option
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Cache buster cannot be empty');
        }

        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'cb';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->value,
        ];
    }
}
