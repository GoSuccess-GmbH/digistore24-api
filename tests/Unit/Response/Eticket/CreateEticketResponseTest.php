<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Eticket;

use GoSuccess\Digistore24\Api\Response\Eticket\CreateEticketResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class CreateEticketResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'etickets' => [
                [
                    'id' => 'TIK123',
                    'url' => 'https://example.com/ticket/TIK123',
                    'email' => 'buyer@example.com'
                ],
                [
                    'id' => 'TIK456',
                    'url' => 'https://example.com/ticket/TIK456',
                    'email' => 'buyer@example.com'
                ]
            ]
        ];
        $response = CreateEticketResponse::fromArray($data);
        
        $this->assertInstanceOf(CreateEticketResponse::class, $response);
        $this->assertCount(2, $response->etickets);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'etickets' => [
                    [
                        'id' => 'TIK123',
                        'url' => 'https://example.com/ticket/TIK123',
                        'email' => 'buyer@example.com'
                    ]
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = CreateEticketResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(CreateEticketResponse::class, $response);
        $this->assertCount(1, $response->etickets);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = CreateEticketResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

