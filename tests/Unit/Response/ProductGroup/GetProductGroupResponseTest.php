<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ProductGroup;

use GoSuccess\Digistore24\Api\Response\ProductGroup\GetProductGroupResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetProductGroupResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = GetProductGroupResponse::fromArray($data);
        
        $this->assertInstanceOf(GetProductGroupResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = GetProductGroupResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetProductGroupResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetProductGroupResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

