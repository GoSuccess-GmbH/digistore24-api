<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Shipping;

use GoSuccess\Digistore24\Api\Response\Shipping\CreateShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateShippingCostPolicyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'shipping_cost_policy_id' => 'SCP123',
                'name' => 'EU Standard Shipping',
                'cost' => 5.99,
                'currency' => 'EUR',
            ],
        ];
        $response = CreateShippingCostPolicyResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateShippingCostPolicyResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('SCP123', $response->getShippingCostPolicyId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'shipping_cost_policy_id' => 'SCP999',
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateShippingCostPolicyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateShippingCostPolicyResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success', 'data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateShippingCostPolicyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

