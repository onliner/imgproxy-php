<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Format extends AbstractOption
{
    public function __construct(
        private string $extension,
    ) {
        if (empty($extension)) {
            throw new InvalidArgumentException('Format cannot be empty');
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'f';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->extension,
        ];
    }
}
