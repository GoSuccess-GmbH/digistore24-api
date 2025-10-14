<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Upsell;

use GoSuccess\Digistore24\Api\Response\Upsell\UpdateUpsellsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class UpdateUpsellsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = UpdateUpsellsResponse::fromArray($data);
        
        $this->assertInstanceOf(UpdateUpsellsResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = UpdateUpsellsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(UpdateUpsellsResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = UpdateUpsellsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

