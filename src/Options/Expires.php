<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Expires extends AbstractOption
{
    private int $timestamp;

    public function __construct(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'exp';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->timestamp,
        ];
    }
}
