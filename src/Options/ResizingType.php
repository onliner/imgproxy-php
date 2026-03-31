<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class ResizingType extends AbstractOption
{
    public const
        FIT = 'fit',
        FILL = 'fill',
        FILL_DOWN = 'fill-down',
        FORCE = 'force',
        AUTO = 'auto'
    ;

    private const TYPES = [
        self::FIT,
        self::FILL,
        self::FILL_DOWN,
        self::FORCE,
        self::AUTO,
    ];

    public function __construct(
        private string $type,
    ) {
        if (!in_array($type, self::TYPES)) {
            throw new InvalidArgumentException(sprintf('Invalid resizing type: %s', $type));
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'rt';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            $this->type,
        ];
    }
}
