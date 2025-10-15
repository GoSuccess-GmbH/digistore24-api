<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Product\ListProductsRequest;
use GoSuccess\Digistore24\Api\Response\Product\ListProductsResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('product')]
final class ProductIntegrationTest extends IntegrationTestCase
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
     * Test listing products
     *
     * @return void
     */
    public function testListProducts(): void
    {
        $response = $this->client->products->list(new ListProductsRequest());

        $this->assertInstanceOf(ListProductsResponse::class, $response);
        $this->assertIsArray($response->products);
        $this->assertIsInt($response->totalCount);
        $this->assertGreaterThanOrEqual(0, $response->totalCount);
    }
}
