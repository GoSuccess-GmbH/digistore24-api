<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\DataTransferObject\TrackingData;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GoSuccess\Digistore24\DataTransferObject\TrackingData
 */
final class TrackingDataTest extends TestCase
{
    public function testCanCreateWithAllFields(): void
    {
        $tracking = new TrackingData();
        $tracking->custom = 'custom-value';
        $tracking->affiliate = 'partner123';
        $tracking->affiliatePriority = 'high';
        $tracking->campaignkey = 'summer2024';
        $tracking->trackingkey = 'track123';
        $tracking->utmSource = 'google';
        $tracking->utmMedium = 'cpc';
        $tracking->utmCampaign = 'brand';
        $tracking->utmTerm = 'keyword';
        $tracking->utmContent = 'ad-variant-a';

        $this->assertSame('custom-value', $tracking->custom);
        $this->assertSame('partner123', $tracking->affiliate);
        $this->assertSame('high', $tracking->affiliatePriority);
        $this->assertSame('summer2024', $tracking->campaignkey);
        $this->assertSame('track123', $tracking->trackingkey);
        $this->assertSame('google', $tracking->utmSource);
        $this->assertSame('cpc', $tracking->utmMedium);
        $this->assertSame('brand', $tracking->utmCampaign);
        $this->assertSame('keyword', $tracking->utmTerm);
        $this->assertSame('ad-variant-a', $tracking->utmContent);
    }

    public function testAllFieldsCanBeNull(): void
    {
        $tracking = new TrackingData();

        $this->assertNull($tracking->custom);
        $this->assertNull($tracking->affiliate);
        $this->assertNull($tracking->campaignkey);
        $this->assertNull($tracking->utmSource);
    }

    public function testCanSetOnlyUtmParameters(): void
    {
        $tracking = new TrackingData();
        $tracking->utmSource = 'newsletter';
        $tracking->utmMedium = 'email';
        $tracking->utmCampaign = 'product-launch';

        $this->assertSame('newsletter', $tracking->utmSource);
        $this->assertSame('email', $tracking->utmMedium);
        $this->assertSame('product-launch', $tracking->utmCampaign);
        $this->assertNull($tracking->affiliate);
    }
}
