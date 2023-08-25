<?php

declare(strict_types=1);

namespace Onliner\ImgProxy;

use Onliner\ImgProxy\Options\AbstractOption;
use Onliner\ImgProxy\Options\Dpr;
use Onliner\ImgProxy\Options\Height;
use Onliner\ImgProxy\Options\Resize;
use Onliner\ImgProxy\Options\ResizingType;
use Onliner\ImgProxy\Options\Width;
use PHPUnit\Framework\TestCase;

class UrlBuilderTest extends TestCase
{
    /**
     * @param array<AbstractOption> $options
     *
     * @dataProvider signedData
     */
    public function testCreateSigned(string $src, string $format, array $options, string $plain, string $encoded): void
    {
        $builder = UrlBuilder::signed('45a3f8', 'eafe30')->with(...$options);

        $this->assertSame($encoded, $builder->url($src, $format));
        $this->assertSame($plain, $builder->encoded(false)->url($src, $format));
    }

    /**
     * @param array<AbstractOption> $options
     *
     * @dataProvider unsignedData
     */
    public function testCreateUnsigned(string $src, string $format, array $options, string $plain, string $encoded): void
    {
        $builder = (new UrlBuilder())->with(...$options);

        $this->assertSame($encoded, $builder->url($src, $format));
        $this->assertSame($plain, $builder->encoded(false)->url($src, $format));
    }

    public function testDefaultOptions(): void
    {
        $builder = new UrlBuilder();
        $this->assertEmpty($builder->options());

        $opt = new Width(300);
        $this->assertSame([$opt], $builder->with($opt)->options());

        $builder = new UrlBuilder();
        $opts = [new Width(300), new Height(400)];
        $this->assertSame($opts, $builder->with(...$opts)->options());
    }

    public function testSplitSize(): void
    {
        $builder = (new UrlBuilder())->with(new Dpr(2));

        // default split size
        $url = $builder->url('http://example.com/image.jpg');
        $this->assertSame('/insecure/dpr:2/aHR0cDovL2V4YW1w/bGUuY29tL2ltYWdl/LmpwZw', $url);

        // disable splitting
        $url = $builder->split(0)->url('http://example.com/image.jpg');
        $this->assertSame('/insecure/dpr:2/aHR0cDovL2V4YW1wbGUuY29tL2ltYWdlLmpwZw', $url);

        // set custom split size
        $url = $builder->split(8)->url('http://example.com/image.jpg');
        $this->assertSame('/insecure/dpr:2/aHR0cDov/L2V4YW1w/bGUuY29t/L2ltYWdl/LmpwZw', $url);
    }

    /**
     * @return array[]
     */
    public function signedData(): array
    {
        return [
            [
                'src' => 'local:///logos/evil_martians.png',
                'format' => 'jpg',
                'options' => [
                    new Resize('fill', 300, 400),
                ],
                'plain' => '/EeAyGdqpR1nqP3eqi1cTTqh6oI79ncDk6SMzZN45D3M/rs:fill:300:400/plain/local:///logos/evil_martians.png@jpg',
                'encoded' => '/0-t9II2dk2z-8lASUfkNIPDVl7bqfuNxiqC9pjxsVhs/rs:fill:300:400/bG9jYWw6Ly8vbG9n/b3MvZXZpbF9tYXJ0/aWFucy5wbmc.jpg',
            ],
            [
                'src' => 'http://example.com/image.jpg',
                'format' => 'png',
                'options' => [
                    new Resize('fill', 300, 400),
                ],
                'plain' => '/jCP281dTZN73H_D6Buj3rOvW-_7ZnHg8hVif7_B12JY/rs:fill:300:400/plain/http://example.com/image.jpg@png',
                'encoded' => '/9J6AS1lXlcmuCzHB4QKGkuxPDzznKxnrMeqoJLQtMUU/rs:fill:300:400/aHR0cDovL2V4YW1w/bGUuY29tL2ltYWdl/LmpwZw.png',
            ],
            [
                'src' => 'http://example.com/im@age.jpg',
                'format' => 'png',
                'options' => [
                    new Resize('fill', 300, 400),
                ],
                'plain' => '/JutKgv7jt6WvIDAEXjd8fSotCJWTgTA-a0A8tMNZAPM/rs:fill:300:400/plain/http://example.com/im%40age.jpg@png',
                'encoded' => '/yYW7rCPA9c1WM9GZ88BJR2LtbnG68taoZ2-HBDBgvlY/rs:fill:300:400/aHR0cDovL2V4YW1w/bGUuY29tL2ltQGFn/ZS5qcGc.png',
            ],
            [
                'src' => 'http://example.com/image.jpg',
                'format' => 'jpg',
                'options' => [
                    new Width(300),
                    new Height(400),
                    new ResizingType('fit'),
                ],
                'plain' => '/0c-LLep4C-7PBda91FC_d5nEJpyyGH1qzNuifVFG32k/w:300/h:400/rt:fit/plain/http://example.com/image.jpg',
                'encoded' => '/0pEYejprWvTcn8ZeJzbHU91zCGFpWjOHMaWhY57aISs/w:300/h:400/rt:fit/aHR0cDovL2V4YW1w/bGUuY29tL2ltYWdl/LmpwZw.jpg',
            ],
        ];
    }

    /**
     * @return array[]
     */
    public function unsignedData(): array
    {
        return [
            [
                'src' => 'local:///logos/evil_martians.png',
                'format' => 'jpg',
                'options' => [
                    new Resize('fill', 300, 400),
                ],
                'plain' => '/insecure/rs:fill:300:400/plain/local:///logos/evil_martians.png@jpg',
                'encoded' => '/insecure/rs:fill:300:400/bG9jYWw6Ly8vbG9n/b3MvZXZpbF9tYXJ0/aWFucy5wbmc.jpg',
            ],
            [
                'src' => 'http://example.com/image.jpg',
                'format' => 'png',
                'options' => [
                    new Resize('fill', 300, 400),
                ],
                'plain' => '/insecure/rs:fill:300:400/plain/http://example.com/image.jpg@png',
                'encoded' => '/insecure/rs:fill:300:400/aHR0cDovL2V4YW1w/bGUuY29tL2ltYWdl/LmpwZw.png',
            ],
            [
                'src' => 'http://example.com/im@age.jpg',
                'format' => 'png',
                'options' => [
                    new Resize('fill', 300, 400),
                ],
                'plain' => '/insecure/rs:fill:300:400/plain/http://example.com/im%40age.jpg@png',
                'encoded' => '/insecure/rs:fill:300:400/aHR0cDovL2V4YW1w/bGUuY29tL2ltQGFn/ZS5qcGc.png',
            ],
            [
                'src' => 'http://example.com/image.jpg',
                'format' => 'jpg',
                'options' => [
                    new Width(300),
                    new Height(400),
                    new ResizingType('fit'),
                ],
                'plain' => '/insecure/w:300/h:400/rt:fit/plain/http://example.com/image.jpg',
                'encoded' => '/insecure/w:300/h:400/rt:fit/aHR0cDovL2V4YW1w/bGUuY29tL2ltYWdl/LmpwZw.jpg',
            ],
        ];
    }
}
