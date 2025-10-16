<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Shipping;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Shipping\ListShippingCostPoliciesResponse;
use PHPUnit\Framework\TestCase;

final class ListShippingCostPoliciesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'shipping_cost_policies' => [
                    [
                        'shipping_cost_policy_id' => 'SCP001',
                        'name' => 'EU Standard',
                        'cost' => 5.99,
                        'currency' => 'EUR',
                    ],
                    [
                        'shipping_cost_policy_id' => 'SCP002',
                        'name' => 'US Express',
                        'cost' => 15.00,
                        'currency' => 'USD',
                    ],
                ],
            ],
        ];
        $response = ListShippingCostPoliciesResponse::fromArray($data);

        $this->assertInstanceOf(ListShippingCostPoliciesResponse::class, $response);
        $policies = $response->getShippingCostPolicies();
        $this->assertCount(2, $policies);
        $this->assertNotEmpty($policies);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'shipping_cost_policies' => [
                        [
                            'shipping_cost_policy_id' => 'SCP999',
                            'cost' => 9.99,
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListShippingCostPoliciesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListShippingCostPoliciesResponse::class, $response);
        $this->assertCount(1, $response->getShippingCostPolicies());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['shipping_cost_policies' => []]],
            headers: [],
            rawBody: 'test',
        );

        $response = ListShippingCostPoliciesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
