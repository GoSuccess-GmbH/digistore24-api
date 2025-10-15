<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\SmartUpgrade;

use GoSuccess\Digistore24\Api\Response\SmartUpgrade\GetSmartupgradeResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetSmartupgradeResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'smartupgrade_id' => 'SU123',
                'from_product_id' => '100',
                'to_product_id' => '200',
                'upgrade_type' => 'automatic',
                'conditions' => ['purchases_count' => 3],
            ],
        ];
        $response = GetSmartupgradeResponse::fromArray($data);
        
        $this->assertInstanceOf(GetSmartupgradeResponse::class, $response);
        $this->assertIsArray($response->getData());
        $this->assertSame('SU123', $response->getData()['smartupgrade_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'smartupgrade_id' => 'SU999',
                    'upgrade_type' => 'manual',
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetSmartupgradeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetSmartupgradeResponse::class, $response);
        $this->assertSame('SU999', $response->getData()['smartupgrade_id']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetSmartupgradeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

