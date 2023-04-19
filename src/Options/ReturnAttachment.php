<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Options;

final class ReturnAttachment extends Option
{
    /**
     * @var bool
     */
    private $value;

    public function __construct(bool $value = true)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'att';
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            (int) $this->value,
        ];
    }
}
