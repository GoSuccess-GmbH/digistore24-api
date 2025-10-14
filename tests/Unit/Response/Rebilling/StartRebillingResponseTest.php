<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Rebilling;

use GoSuccess\Digistore24\Api\Response\Rebilling\StartRebillingResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class StartRebillingResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = StartRebillingResponse::fromArray($data);
        
        $this->assertInstanceOf(StartRebillingResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = StartRebillingResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(StartRebillingResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = StartRebillingResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

