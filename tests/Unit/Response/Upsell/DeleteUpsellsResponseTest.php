<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Upsell;

use GoSuccess\Digistore24\Api\Response\Upsell\DeleteUpsellsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class DeleteUpsellsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = DeleteUpsellsResponse::fromArray($data);
        
        $this->assertInstanceOf(DeleteUpsellsResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = DeleteUpsellsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(DeleteUpsellsResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = DeleteUpsellsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

