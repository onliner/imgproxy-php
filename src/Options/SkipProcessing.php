<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class SkipProcessing extends AbstractOption
{
    /**
     * @var string[]
     */
    private $extensions;

    public function __construct(string ... $extensions)
    {
        $this->extensions = array_filter($extensions);

        if (empty($this->extensions)) {
            throw new InvalidArgumentException('At least one extension must be set');
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'skp';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return $this->extensions;
    }
}
