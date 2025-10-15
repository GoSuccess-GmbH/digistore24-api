<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ServiceProof;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\ServiceProof\ListServiceProofRequestsResponse;
use PHPUnit\Framework\TestCase;

final class ListServiceProofRequestsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'service_proof_requests' => [
                    ['request_id' => 'SPR001', 'status' => 'pending'],
                    ['request_id' => 'SPR002', 'status' => 'completed'],
                ],
            ],
        ];
        $response = ListServiceProofRequestsResponse::fromArray($data);

        $this->assertInstanceOf(ListServiceProofRequestsResponse::class, $response);
        $this->assertCount(2, $response->getServiceProofRequests());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'service_proof_requests' => [
                        ['request_id' => 'SPR999'],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListServiceProofRequestsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListServiceProofRequestsResponse::class, $response);
        $this->assertCount(1, $response->getServiceProofRequests());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'service_proof_requests' => [],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = ListServiceProofRequestsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
