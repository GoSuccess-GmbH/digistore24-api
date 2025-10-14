<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ConversionTool;

use GoSuccess\Digistore24\Api\Response\ConversionTool\ListConversionToolsResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListConversionToolsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'smartupgrades' => [
                ['id' => 1, 'name' => 'Upgrade 1'],
                ['id' => 2, 'name' => 'Upgrade 2']
            ]
        ];
        $response = ListConversionToolsResponse::fromArray($data);
        
        $this->assertInstanceOf(ListConversionToolsResponse::class, $response);
        $this->assertCount(2, $response->getSmartupgrades());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'smartupgrades' => [
                    ['id' => 1, 'name' => 'Upgrade 1']
                ]
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListConversionToolsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListConversionToolsResponse::class, $response);
        $this->assertCount(1, $response->getSmartupgrades());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListConversionToolsResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

