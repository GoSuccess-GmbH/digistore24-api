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
        $data = [
            'data' => [
                'commission' => [
                    'first_sale' => 50,
                    'resale' => 40
                ]
            ]
        ];
        $response = GetAffiliateCommissionResponse::fromArray($data);
        
        $this->assertInstanceOf(GetAffiliateCommissionResponse::class, $response);
        $this->assertSame(['first_sale' => 50, 'resale' => 40], $response->getCommission());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'commission' => [
                        'first_sale' => 50,
                        'resale' => 40
                    ]
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetAffiliateCommissionResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetAffiliateCommissionResponse::class, $response);
        $this->assertSame(['first_sale' => 50, 'resale' => 40], $response->getCommission());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['commission' => []]],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetAffiliateCommissionResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

