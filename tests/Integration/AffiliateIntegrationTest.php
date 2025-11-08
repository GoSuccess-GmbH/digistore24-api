<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateCommissionRequest;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetAffiliateCommissionResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('affiliate')]
final class AffiliateIntegrationTest extends IntegrationTestCase
{
    private Digistore24 $client;

    protected function setUp(): void
    {
        parent::setUp();

        $apiKey = $this->getApiKey();
        $config = new Configuration(apiKey: $apiKey);
        $this->client = new Digistore24($config);
    }

    /**
     * Test getting affiliate commission
     */
    public function testGetAffiliateCommission(): void
    {
        $affiliateId = $this->requireConfig(
            'DS24_TEST_AFFILIATE_ID',
            'Test affiliate ID required for affiliate tests',
        );

        $request = new GetAffiliateCommissionRequest(
            affiliateId: $affiliateId,
            productIds: 'all',
        );

        $response = $this->client->affiliates->getCommission($request);

        $this->assertInstanceOf(GetAffiliateCommissionResponse::class, $response);
        $this->assertSame($affiliateId, $response->affiliateId);
    }
}
