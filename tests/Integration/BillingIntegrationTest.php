<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Billing\CreateBillingOnDemandRequest;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('billing')]
class BillingIntegrationTest extends IntegrationTestCase
{
    private Digistore24 $client;

    protected function setUp(): void
    {
        parent::setUp();

        $apiKey = $this->getApiKey();
        $config = new Configuration(apiKey: $apiKey);
        $this->client = new Digistore24($config);
    }

    public function testCreateBillingOnDemand(): void
    {
        $purchaseId = $this->requireConfig(
            'DS24_TEST_PURCHASE_WITH_REBILLING',
            'Test purchase with rebilling capability required'
        );

        $productId = $this->requireConfig(
            'DS24_TEST_PRODUCT_ID',
            'Test product ID required'
        );

        $request = new CreateBillingOnDemandRequest(
            purchaseId: $purchaseId,
            productId: $productId
        );

        $response = $this->client->billing->createOnDemand($request);

        $this->assertNotEmpty($response->getCreatedPurchaseId());
    }

    public function testCreateBillingOnDemandWithPaymentPlan(): void
    {
        $purchaseId = $this->requireConfig('DS24_TEST_PURCHASE_WITH_REBILLING');
        $productId = $this->requireConfig('DS24_TEST_PRODUCT_WITH_PAYMENT_PLAN');

        $request = new CreateBillingOnDemandRequest(
            purchaseId: $purchaseId,
            productId: $productId,
            paymentPlan: [
                'first_amount' => 0.01,
                'other_amounts' => 0.01,
                'currency' => 'EUR',
                'number_of_installments' => 2,
                'other_billing_intervals' => '1_month',
            ]
        );

        $response = $this->client->billing->createOnDemand($request);

        $this->assertNotEmpty($response->getCreatedPurchaseId());
    }
}
