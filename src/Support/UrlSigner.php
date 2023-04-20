<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

class UrlSigner
{
    private string $salt;
    private string $key;

    public function __construct(string $key, string $salt)
    {
        $this->key = pack('H*', $key);
        $this->salt = pack('H*', $salt);
    }

    /**
     * @param string $str
     *
     * @return string
     */
    public function sign(string $str): string
    {
        return hash_hmac('sha256', $this->salt . $str, $this->key, true);
    }
}
