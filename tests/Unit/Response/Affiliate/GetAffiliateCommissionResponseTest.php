<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Response\Affiliate\GetAffiliateCommissionResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetAffiliateCommissionResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = GetAffiliateCommissionResponse::fromArray($data);
        
        $this->assertInstanceOf(GetAffiliateCommissionResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = GetAffiliateCommissionResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetAffiliateCommissionResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetAffiliateCommissionResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

