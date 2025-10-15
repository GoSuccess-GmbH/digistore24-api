<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Response\Purchase\GetPurchaseTrackingResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetPurchaseTrackingResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'tracking_id' => 'TRK123456',
                'source' => 'google',
                'medium' => 'cpc',
                'campaign' => 'summer_sale',
                'ad_group' => 'premium_products',
                'keyword' => 'online course',
            ],
        ];
        $response = GetPurchaseTrackingResponse::fromArray($data);
        
        $this->assertInstanceOf(GetPurchaseTrackingResponse::class, $response);
        $this->assertIsArray($response->getTracking());
        $this->assertSame('TRK123456', $response->getTracking()['tracking_id']);
        $this->assertSame('google', $response->getTracking()['source']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'tracking_id' => 'TRK999',
                    'source' => 'facebook',
                    'campaign' => 'winter_promo',
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetPurchaseTrackingResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetPurchaseTrackingResponse::class, $response);
        $this->assertSame('facebook', $response->getTracking()['source']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'tracking_id' => 'TRK111',
                ],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetPurchaseTrackingResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

