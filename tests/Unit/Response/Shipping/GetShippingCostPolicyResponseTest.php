<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Shipping;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Shipping\GetShippingCostPolicyResponse;
use PHPUnit\Framework\TestCase;

final class GetShippingCostPolicyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'shipping_cost_policy' => [
                    'shipping_cost_policy_id' => 'SCP123',
                    'name' => 'EU Standard Shipping',
                    'cost' => 5.99,
                    'currency' => 'EUR',
                    'countries' => ['DE', 'AT', 'CH'],
                    'weight_range' => ['min' => 0, 'max' => 2000],
                ],
            ],
        ];
        $response = GetShippingCostPolicyResponse::fromArray($data);

        $this->assertInstanceOf(GetShippingCostPolicyResponse::class, $response);
        $policy = $response->shippingCostPolicy;
        $this->assertSame('SCP123', $policy['shipping_cost_policy_id']);
        $this->assertSame(5.99, $policy['cost']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'shipping_cost_policy' => [
                        'shipping_cost_policy_id' => 'SCP999',
                        'name' => 'US Express',
                        'cost' => 15.00,
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetShippingCostPolicyResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetShippingCostPolicyResponse::class, $response);
        $this->assertSame('SCP999', $response->shippingCostPolicy['shipping_cost_policy_id']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['shipping_cost_policy' => []]],
            headers: [],
            rawBody: 'test',
        );

        $response = GetShippingCostPolicyResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
