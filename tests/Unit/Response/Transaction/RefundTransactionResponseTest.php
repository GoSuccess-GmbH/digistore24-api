<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Transaction;

use GoSuccess\Digistore24\Api\Response\Transaction\RefundTransactionResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class RefundTransactionResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = RefundTransactionResponse::fromArray($data);
        
        $this->assertInstanceOf(RefundTransactionResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = RefundTransactionResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(RefundTransactionResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = RefundTransactionResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

