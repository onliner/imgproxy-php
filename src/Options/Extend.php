<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Extend extends AbstractOption
{
    private bool $extend;
    private ?Gravity $gravity = null;

    public function __construct(bool $extend = true, Gravity|string|null $gravity = null)
    {
        $this->extend = $extend;
        $this->gravity = is_string($gravity) ? Gravity::fromString($gravity) : $gravity;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'ex';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return array_merge(
            [(int) $this->extend],
            $this->gravity ? $this->gravity->data() : []
        );
    }
}
