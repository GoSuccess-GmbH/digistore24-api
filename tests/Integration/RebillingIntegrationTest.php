<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Rebilling\ListRebillingStatusChangesRequest;
use GoSuccess\Digistore24\Api\Response\Rebilling\ListRebillingStatusChangesResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('rebilling')]
final class RebillingIntegrationTest extends IntegrationTestCase
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
     * Test listing rebilling status changes
     */
    public function testListRebillingStatusChanges(): void
    {
        $response = $this->client->rebilling->listStatusChanges(
            new ListRebillingStatusChangesRequest(),
        );

        $this->assertInstanceOf(ListRebillingStatusChangesResponse::class, $response);
    }
}
