<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Statistics;

use GoSuccess\Digistore24\Api\Response\Statistics\StatsAffiliateToplistResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class StatsAffiliateToplistResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = StatsAffiliateToplistResponse::fromArray($data);
        
        $this->assertInstanceOf(StatsAffiliateToplistResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = StatsAffiliateToplistResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(StatsAffiliateToplistResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = StatsAffiliateToplistResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

