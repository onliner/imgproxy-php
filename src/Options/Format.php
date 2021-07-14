<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Format extends Option
{
    /**
     * @var string
     */
    private $extension;

    public function __construct(string $extension)
    {
        if (empty($extension)) {
            throw new InvalidArgumentException('Format cannot be empty');
        }

        $this->extension = $extension;
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
