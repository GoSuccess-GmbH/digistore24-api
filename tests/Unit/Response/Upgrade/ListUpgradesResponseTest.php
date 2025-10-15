<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Upgrade;

use GoSuccess\Digistore24\Api\Response\Upgrade\ListUpgradesResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListUpgradesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'upgrades' => [
                    [
                        'upgrade_id' => 'UPG001',
                        'from_product_id' => '100',
                        'to_product_id' => '200',
                        'price_difference' => 30.00,
                    ],
                    [
                        'upgrade_id' => 'UPG002',
                        'from_product_id' => '200',
                        'to_product_id' => '300',
                        'price_difference' => 50.00,
                    ],
                ],
            ],
        ];
        $response = ListUpgradesResponse::fromArray($data);
        
        $this->assertInstanceOf(ListUpgradesResponse::class, $response);
        $this->assertIsArray($response->getUpgrades());
        $this->assertCount(2, $response->getUpgrades());
        $this->assertSame('UPG001', $response->getUpgrades()[0]['upgrade_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'upgrades' => [
                        ['upgrade_id' => 'UPG999'],
                    ],
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListUpgradesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListUpgradesResponse::class, $response);
        $this->assertCount(1, $response->getUpgrades());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'upgrades' => [],
                ],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListUpgradesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

