<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Shipping;

use GoSuccess\Digistore24\Api\Response\Shipping\ListShippingCostPoliciesResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListShippingCostPoliciesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = ListShippingCostPoliciesResponse::fromArray($data);
        
        $this->assertInstanceOf(ListShippingCostPoliciesResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = ListShippingCostPoliciesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListShippingCostPoliciesResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListShippingCostPoliciesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

