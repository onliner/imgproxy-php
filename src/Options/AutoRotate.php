<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class AutoRotate extends AbstractOption
{
    /**
     * @var bool
     */
    private $rotate;

    public function __construct(bool $rotate = true)
    {
        $this->rotate = $rotate;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'ar';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            (int) $this->rotate,
        ];
    }
}
