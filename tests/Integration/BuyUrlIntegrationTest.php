<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\DTO\BuyerData;
use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Api\Request\BuyUrl\ListBuyUrlsRequest;
use GoSuccess\Digistore24\Api\Response\BuyUrl\ListBuyUrlsResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('buyurl')]
class BuyUrlIntegrationTest extends IntegrationTestCase
{
    private Digistore24 $client;

    protected function setUp(): void
    {
        parent::setUp();

        $apiKey = $this->getApiKey();
        $config = new Configuration(apiKey: $apiKey);
        $this->client = new Digistore24($config);
    }

    public function testCreateBuyUrl(): void
    {
        $productId = $this->requireConfig(
            'DS24_TEST_PRODUCT_ID',
            'Test product ID required for buy URL tests'
        );

        $request = new CreateBuyUrlRequest();
        $request->productId = (int)$productId;
        $request->buyer = new BuyerData();
        $request->buyer->email = $this->getConfig('DS24_TEST_BUYER_EMAIL') ?? 'test@example.com';

        $response = $this->client->buyUrls->create($request);

        $url = $response->url ?? '';
        $this->assertNotEmpty($url);
        $this->assertStringStartsWith('https://', $url);
    }

    public function testListBuyUrls(): void
    {
        $request = new ListBuyUrlsRequest();
        $response = $this->client->buyUrls->list($request);

        $this->assertInstanceOf(ListBuyUrlsResponse::class, $response);
    }
}
