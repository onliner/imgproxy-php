<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Padding extends AbstractOption
{
    public function __construct(
        private ?int $top = null,
        private ?int $right = null,
        private ?int $bottom = null,
        private ?int $left = null,
    ) {
        if (is_null($top ?? $right ?? $bottom ?? $left)) {
            throw new InvalidArgumentException('At least one dimension must be set');
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'pd';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->top,
            $this->right,
            $this->bottom,
            $this->left,
        ];
    }
}
