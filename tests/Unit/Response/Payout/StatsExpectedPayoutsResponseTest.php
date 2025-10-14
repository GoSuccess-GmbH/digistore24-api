<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Payout;

use GoSuccess\Digistore24\Api\Response\Payout\StatsExpectedPayoutsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class StatsExpectedPayoutsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = StatsExpectedPayoutsResponse::fromArray($data);
        
        $this->assertInstanceOf(StatsExpectedPayoutsResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = StatsExpectedPayoutsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(StatsExpectedPayoutsResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = StatsExpectedPayoutsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

