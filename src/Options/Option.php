<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Option extends AbstractOption
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array<string, mixed>
     */
    private $data;

    /**
     * @param string $name
     * @param array<mixed> $data
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
