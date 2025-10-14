<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Upgrade;

use GoSuccess\Digistore24\Api\Response\Upgrade\DeleteUpgradeResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class DeleteUpgradeResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = DeleteUpgradeResponse::fromArray($data);
        
        $this->assertInstanceOf(DeleteUpgradeResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = DeleteUpgradeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(DeleteUpgradeResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = DeleteUpgradeResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

