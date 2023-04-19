<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class FormatQuality extends Option
{
    /**
     * @var array[]
     */
    private $options = [];

    /**
     * @param array<string, int> $options
     */
    public function __construct(array $options)
    {
        foreach ($options as $format => $quality) {
            $data = (new Quality($quality))->data();
            $this->options[] = [$format, ...$data];
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
