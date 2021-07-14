<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class ResizingType extends Option
{
    public const
        FIT = 'fit',
        FILL = 'fill',
        AUTO = 'auto'
    ;

    private const TYPES = [self::FIT, self::FILL, self::AUTO];

    /**
     * @var string
     */
    private $type;

    public function __construct(string $type)
    {
        if (!in_array($type, self::TYPES)) {
            throw new InvalidArgumentException(sprintf('Invalid resizing type: %s', $type));
        }

        $this->type = $type;
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
