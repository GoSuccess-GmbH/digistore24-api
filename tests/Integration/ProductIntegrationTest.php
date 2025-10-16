<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Product\ListProductsRequest;
use GoSuccess\Digistore24\Api\Response\Product\ListProductsResponse;
use GoSuccess\Digistore24\Api\Response\Product\ProductListItem;
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

        // Validate response structure
        $this->assertIsArray($response->products);
        $this->assertIsInt($response->totalCount);
        $this->assertGreaterThanOrEqual(0, $response->totalCount);

        // If products exist, validate structure of first product
        if (!empty($response->products)) {
            $product = $response->products[0];
            $this->assertInstanceOf(ProductListItem::class, $product);

            // Validate essential properties
            $this->assertNotEmpty($product->id);
            $this->assertNotEmpty($product->name);
            $this->assertNotEmpty($product->currency);
            $this->assertNotEmpty($product->ownerId);
            $this->assertNotEmpty($product->ownerName);

            // Validate optional properties exist
            $this->assertIsString($product->description);
            $this->assertIsString($product->salespageUrl);
            $this->assertIsString($product->productGroupName);
            $this->assertIsBool($product->isActive);
            $this->assertIsBool($product->isDeleted);

            // Validate ALL language variants exist
            $this->assertIsString($product->nameDe);
            $this->assertIsString($product->nameEn);
            $this->assertIsString($product->descriptionDe);
            $this->assertIsString($product->descriptionEn);
            $this->assertIsString($product->optinText);
            $this->assertIsString($product->optinTextDe);

            // Validate all boolean flags work correctly
            $this->assertIsBool($product->isFreeUpsellEnabled);
            $this->assertIsBool($product->isVatShown);
            $this->assertIsBool($product->addOrderDataToThankyouPageUrl);

            // Validate notification email fields
            $this->assertIsString($product->notifyPaymentEmails);
            $this->assertIsString($product->notifyRefundEmails);

            // Validate date properties
            if ($product->createdAt !== null) {
                $this->assertInstanceOf(\DateTimeInterface::class, $product->createdAt);
            }
        }
    }
}
