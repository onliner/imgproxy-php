<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Option extends AbstractOption
{
    private string $name;
    /**
     * @var array<string, mixed>
     */
    private array $data;

    /**
     * @param string $name
     * @param array<string, mixed> $data
     */
    public function __construct(string $name, array $data = [])
    {
        $this->name = $name;
        $this->data = $data;
    }

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
