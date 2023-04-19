<?php

declare(strict_types=1);

namespace Onliner\ImgProxy;

use Onliner\ImgProxy\Options\AbstractOption;
use Onliner\ImgProxy\Support\ImageFormat;
use Onliner\ImgProxy\Support\UrlSigner;

class UrlBuilder
{
    private const INSECURE_SIGN = 'insecure';

    private ?UrlSigner $signer;
    private bool $encoded = true;
    private int $splitSize = 16;
    /**
     * @var array<AbstractOption>
     */
    private array $options = [];

    /**
     * @param UrlSigner|null $signer
     */
    public function __construct(UrlSigner $signer = null)
    {
        $this->signer = $signer;
    }

    /**
     * @param string $key
     * @param string $salt
     *
     * @return self
     */
    public static function signed(string $key, string $salt): self
    {
        return new self(new UrlSigner($key, $salt));
    }

    /**
     * @return array<AbstractOption>
     */
    public function options(): array
    {
        return $this->options;
    }

    /**
     * @param AbstractOption ...$options
     *
     * @return $this
     */
    public function with(AbstractOption ...$options): self
    {
        $self = clone $this;
        $self->options = array_merge($this->options, $options);

        return $self;
    }

    /**
     * @param bool $encoded
     *
     * @return $this
     */
    public function encoded(bool $encoded): self
    {
        $self = clone $this;
        $self->encoded = $encoded;

        return $self;
    }

    /**
     * @param int $size
     *
     * @return self
     */
    public function split(int $size): self
    {
        $self = clone $this;
        $self->splitSize = $size;

        return $self;
    }

    /**
     * @param string $src
     * @param string|null $extension
     *
     * @return string
     */
    public function url(string $src, string $extension = null): string
    {
        $format = $extension ? new ImageFormat($extension) : null;

        $opt = implode('/', $this->options);
        $path = sprintf('/%s/%s', $opt, $this->source($src, $format));

        return sprintf('/%s%s', $this->signature($path), $path);
    }

    /**
     * @param string $src
     * @param ImageFormat|null $format
     *
     * @return string
     */
    private function source(string $src, ?ImageFormat $format): string
    {
        if ($this->encoded) {
            $sep = '.';
            $source = $this->encode($src);

            if ($this->splitSize > 0) {
                $source = wordwrap($source, $this->splitSize, '/', true);
            }
        } else {
            $sep = '@';
            $source = str_replace($sep, '%40', 'plain/' . $src);
        }

        $extension = null;
        if ($format && !$format->isEquals($this->extension($src))) {
            $extension = $format->value();
        }

        return implode($sep, array_filter([$source, $extension]));
    }

    /**
     * @param string $url
     *
     * @return string
     */
    private function encode(string $url): string
    {
        return rtrim(strtr(base64_encode($url), '+/', '-_'), '=');
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private function signature(string $path): string
    {
        if ($this->signer !== null) {
            return $this->encode($this->signer->sign($path));
        }

        return self::INSECURE_SIGN;
    }

    /**
     * @param string $src
     *
     * @return string
     */
    private function extension(string $src): string
    {
        return pathinfo(parse_url($src, PHP_URL_PATH) ?: '', PATHINFO_EXTENSION);
    }
}
