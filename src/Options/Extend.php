<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Extend extends Option
{
    /**
     * @var bool
     */
    private $extend;
    /**
     * @var Gravity|null $gravity
     */
    private $gravity;

    public function __construct(bool $extend = true, string $gravity = null)
    {
        $this->extend = $extend;

        if ($gravity !== null) {
            $this->gravity = Gravity::fromString($gravity);
        }
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
