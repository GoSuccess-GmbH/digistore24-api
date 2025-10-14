<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Shipping;

use GoSuccess\Digistore24\Api\Response\Shipping\DeleteShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class DeleteShippingCostPolicyResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = DeleteShippingCostPolicyResponse::fromArray($data);
        
        $this->assertInstanceOf(DeleteShippingCostPolicyResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = DeleteShippingCostPolicyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(DeleteShippingCostPolicyResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = DeleteShippingCostPolicyResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

