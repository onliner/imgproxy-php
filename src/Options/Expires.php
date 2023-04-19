<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class Expires extends Option
{
    /**
     * @var int
     */
    private $timestamp;

    public function __construct(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function name(): string
    {
        return 'exp';
    }

    public function data(): array
    {
        return [
            $this->timestamp,
        ];
    }
}
