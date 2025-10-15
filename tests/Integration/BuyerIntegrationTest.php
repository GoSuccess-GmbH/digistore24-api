<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Buyer\GetBuyerRequest;
use GoSuccess\Digistore24\Api\Request\Buyer\ListBuyersRequest;
use GoSuccess\Digistore24\Api\Response\Buyer\GetBuyerResponse;
use GoSuccess\Digistore24\Api\Response\Buyer\ListBuyersResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('buyer')]
final class BuyerIntegrationTest extends IntegrationTestCase
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
     * Test getting a buyer by email
     *
     * @return void
     */
    public function testGetBuyerByEmail(): void
    {
        $buyerEmail = $this->requireConfig(
            'DS24_TEST_BUYER_EMAIL',
            'Test buyer email required for buyer tests'
        );

        $request = new GetBuyerRequest(identifier: $buyerEmail);
        $response = $this->client->buyers->get($request);

        $this->assertInstanceOf(GetBuyerResponse::class, $response);
        $this->assertNotEmpty($response->getData());
    }

    /**
     * Test listing buyers
     *
     * @return void
     */
    public function testListBuyers(): void
    {
        $response = $this->client->buyers->list(new ListBuyersRequest());

        $this->assertInstanceOf(ListBuyersResponse::class, $response);
    }
}
