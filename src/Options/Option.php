<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Option extends AbstractOption
{
    /**
     * @param string $name
     * @param array<string, mixed> $data
     */
    public function __construct(
        private string $name,
        private array $data = [],
    ) {}

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return $this->data;
    }
}
