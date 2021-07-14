<?php

declare(strict_types=1);

namespace Onliner\ImgProxy\Support;

use PHPUnit\Framework\TestCase;

class UrlSignerTest extends TestCase
{
    public function testCreate(): void
    {
        $signer = new UrlSigner('45a3f82a21ce1dfea13', '52c8aa1564c73a8a812');

        $this->assertSame(
            '8840d3e5257776308dbf20df8150fce45b44adb4e7b9915a47124a46c7c18ed0',
            bin2hex($signer->sign('test'))
        );
    }
}
