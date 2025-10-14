<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Eticket;

use GoSuccess\Digistore24\Api\Response\Eticket\GetEticketSettingsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class GetEticketSettingsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'eticket_enabled' => true,
            'default_location_id' => 'LOC123',
            'default_template_id' => 'TPL456',
            'max_tickets_per_order' => 5,
            'require_email_validation' => true,
            'settings' => ['auto_send' => true]
        ];
        $response = GetEticketSettingsResponse::fromArray($data);
        
        $this->assertInstanceOf(GetEticketSettingsResponse::class, $response);
        $this->assertTrue($response->eticketEnabled);
        $this->assertSame(5, $response->maxTicketsPerOrder);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'eticket_enabled' => true,
                'max_tickets_per_order' => 10
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = GetEticketSettingsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(GetEticketSettingsResponse::class, $response);
        $this->assertTrue($response->eticketEnabled);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = GetEticketSettingsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

