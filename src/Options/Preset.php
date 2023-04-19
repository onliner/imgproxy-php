<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class Preset extends AbstractOption
{
    /**
     * @var string[]
     */
    private array $presets;

    public function __construct(string ...$presets)
    {
        $this->presets = array_filter($presets);

        if (empty($this->presets)) {
            throw new InvalidArgumentException('At least one preset must be set');
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'pr';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return $this->presets;
    }
}
