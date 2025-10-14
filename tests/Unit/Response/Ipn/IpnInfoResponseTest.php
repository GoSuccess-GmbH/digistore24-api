<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Ipn;

use GoSuccess\Digistore24\Api\Response\Ipn\IpnInfoResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class IpnInfoResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = IpnInfoResponse::fromArray($data);
        
        $this->assertInstanceOf(IpnInfoResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = IpnInfoResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(IpnInfoResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = IpnInfoResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

