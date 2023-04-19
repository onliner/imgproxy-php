<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

use InvalidArgumentException;

class ImageFormat
{
    private const SUPPORTED = [
        'png', 'jpg', 'jpeg', 'webp', 'avif', 'gif', 'ico',
        'svg', 'heic', 'bmp', 'tiff', 'pdf', 'mp4',
    ];

    private string $extension;

    /**
     * @param string $extension
     */
    public function __construct(string $extension)
    {
        $this->extension = $this->cast($extension);

        if (!self::isSupported($this->extension)) {
            throw new InvalidArgumentException(sprintf('Invalid image format: %s', $extension));
        }
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public static function isSupported(string $value): bool
    {
        return in_array($value, self::SUPPORTED);
    }

    /**
     * @param string $extension
     *
     * @return bool
     */
    public function isEquals(string $extension): bool
    {
        return $this->extension === $this->cast($extension);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->extension;
    }

    private function cast(string $extension): string
    {
        return strtolower(trim($extension));
    }
}
