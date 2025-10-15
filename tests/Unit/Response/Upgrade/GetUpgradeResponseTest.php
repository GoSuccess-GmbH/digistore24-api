<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Upgrade;

use GoSuccess\Digistore24\Api\Response\Upgrade\GetUpgradeResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetUpgradeResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'upgrade_id' => 'UPG123',
                'from_product_id' => '100',
                'to_product_id' => '200',
                'price_difference' => 50.00,
                'description' => 'Upgrade to premium',
            ],
        ];
        $response = GetUpgradeResponse::fromArray($data);
        
        $this->assertInstanceOf(GetUpgradeResponse::class, $response);
        $this->assertIsArray($response->getData());
        $this->assertSame('UPG123', $response->getData()['upgrade_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'upgrade_id' => 'UPG999',
                    'from_product_id' => '50',
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetUpgradeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetUpgradeResponse::class, $response);
        $this->assertSame('UPG999', $response->getData()['upgrade_id']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetUpgradeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

