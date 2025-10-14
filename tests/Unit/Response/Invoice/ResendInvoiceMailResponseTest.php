<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Invoice;

use GoSuccess\Digistore24\Api\Response\Invoice\ResendInvoiceMailResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ResendInvoiceMailResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = ResendInvoiceMailResponse::fromArray($data);
        
        $this->assertInstanceOf(ResendInvoiceMailResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = ResendInvoiceMailResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ResendInvoiceMailResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ResendInvoiceMailResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

