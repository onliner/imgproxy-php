<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

use InvalidArgumentException;

final class FormatQuality extends AbstractOption
{
    /**
     * @var array[]
     */
    private array $options = [];

    /**
     * @param array<string, int> $options
     */
    public function __construct(array $options)
    {
        foreach ($options as $format => $quality) {
            $data = (new Quality($quality))->data();
            $this->options[] = [$format, ...$data];
        }

        if (empty($this->options)) {
            throw new InvalidArgumentException('At least one format quality must be set');
        }
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'fq';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return array_merge(...$this->options);
    }
}
