<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

abstract class Option
{
    /**
     * @return string
     */
    abstract public function name(): string;

    /**
     * @return array<mixed>
     */
    abstract public function data(): array;

    /**
     * @return string
     */
    public function value(): string
    {
        $data = $this->data();

        array_unshift($data, $this->name());

        // Remove empty options from end.
        return rtrim(implode(':', $data), ':');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }
}
