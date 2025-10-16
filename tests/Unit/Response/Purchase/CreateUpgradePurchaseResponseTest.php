<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Purchase\CreateUpgradePurchaseResponse;
use PHPUnit\Framework\TestCase;

final class CreateUpgradePurchaseResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'new_purchase' => [
                    'purchase_id' => 'P123456',
                    'product_id' => 789,
                    'status' => 'active',
                ],
                'upgrade_info' => [
                    'old_purchase_id' => 'P111111',
                    'upgrade_amount' => 49.99,
                    'currency' => 'EUR',
                ],
            ],
        ];
        $response = CreateUpgradePurchaseResponse::fromArray($data);

        $this->assertInstanceOf(CreateUpgradePurchaseResponse::class, $response);
        $newPurchase = $response->getNewPurchase();
        $this->assertSame('P123456', $newPurchase['purchase_id'] ?? null);
        $upgradeInfo = $response->getUpgradeInfo();
        $this->assertSame('P111111', $upgradeInfo['old_purchase_id'] ?? null);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'new_purchase' => [
                        'purchase_id' => 'P654321',
                        'product_id' => 456,
                    ],
                    'upgrade_info' => [
                        'upgrade_date' => '2024-01-15',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = CreateUpgradePurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(CreateUpgradePurchaseResponse::class, $response);
        $newPurchase = $response->getNewPurchase();
        $this->assertSame('P654321', $newPurchase['purchase_id'] ?? null);
        $upgradeInfo = $response->getUpgradeInfo();
        $this->assertSame('2024-01-15', $upgradeInfo['upgrade_date'] ?? null);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'new_purchase' => ['purchase_id' => 'P999999'],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = CreateUpgradePurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
