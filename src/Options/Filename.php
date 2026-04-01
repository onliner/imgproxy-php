<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Filename extends AbstractOption
{
    public function __construct(
        private string $name,
    ) {
        if (empty($name)) {
            throw new InvalidArgumentException('Filename cannot be empty');
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'fn';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->name,
        ];
    }
}
