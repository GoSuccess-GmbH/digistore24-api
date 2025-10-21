<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\Api\DTO\UrlsData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UrlsData::class)]
final class UrlsDataTest extends TestCase
{
    public function testCanCreateWithValidUrls(): void
    {
        $urls = new UrlsData();
        $urls->thankyouUrl = 'https://example.com/thanks';
        $urls->fallbackUrl = 'https://example.com/fallback';
        $urls->upgradeErrorUrl = 'https://example.com/error';

        $this->assertSame('https://example.com/thanks', $urls->thankyouUrl);
        $this->assertSame('https://example.com/fallback', $urls->fallbackUrl);
        $this->assertSame('https://example.com/error', $urls->upgradeErrorUrl);
    }

    public function testThankyouUrlValidationThrowsExceptionForInvalidUrl(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Thank you URL must be a valid URL');

        $urls = new UrlsData();
        $urls->thankyouUrl = 'not-a-valid-url';
    }

    public function testFallbackUrlValidationThrowsExceptionForInvalidUrl(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Fallback URL must be a valid URL');

        $urls = new UrlsData();
        $urls->fallbackUrl = 'invalid';
    }

    public function testUpgradeErrorUrlValidationThrowsExceptionForInvalidUrl(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Upgrade error URL must be a valid URL');

        $urls = new UrlsData();
        $urls->upgradeErrorUrl = 'not valid';
    }

    public function testFromArrayCreatesInstanceCorrectly(): void
    {
        $data = [
            'thankyou_url' => 'https://example.com/thanks',
            'fallback_url' => 'https://example.com/fallback',
            'upgrade_error_url' => 'https://example.com/error',
        ];

        $urls = UrlsData::fromArray($data);

        $this->assertSame('https://example.com/thanks', $urls->thankyouUrl);
        $this->assertSame('https://example.com/fallback', $urls->fallbackUrl);
        $this->assertSame('https://example.com/error', $urls->upgradeErrorUrl);
    }

    public function testToArrayConvertsCorrectly(): void
    {
        $urls = new UrlsData();
        $urls->thankyouUrl = 'https://example.com/thanks';
        $urls->fallbackUrl = 'https://example.com/fallback';

        $array = $urls->toArray();

        $this->assertSame([
            'thankyou_url' => 'https://example.com/thanks',
            'fallback_url' => 'https://example.com/fallback',
        ], $array);
    }

    public function testOptionalFieldsCanBeNull(): void
    {
        $urls = new UrlsData();

        $this->assertNull($urls->thankyouUrl);
        $this->assertNull($urls->fallbackUrl);
        $this->assertNull($urls->upgradeErrorUrl);
    }

    public function testToArrayExcludesNullFields(): void
    {
        $urls = new UrlsData();
        $urls->thankyouUrl = 'https://example.com/thanks';

        $array = $urls->toArray();

        $this->assertSame(['thankyou_url' => 'https://example.com/thanks'], $array);
        $this->assertArrayNotHasKey('fallback_url', $array);
        $this->assertArrayNotHasKey('upgrade_error_url', $array);
    }
}
