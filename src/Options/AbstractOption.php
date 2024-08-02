<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use ReflectionClass;
use Stringable;

abstract class AbstractOption implements Stringable
{
    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function __set_state(array $data): static
    {
        $class = new ReflectionClass(static::class);
        $self = $class->newInstanceWithoutConstructor();

        $assigner = function () use ($self, $data) {
            foreach ($data as $key => $value) {
                $self->{$key} = $value;
            }
        };
        $assigner->bindTo($self, static::class)();

        return $self;
    }

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
