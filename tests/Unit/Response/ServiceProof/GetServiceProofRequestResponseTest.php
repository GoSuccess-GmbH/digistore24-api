<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ServiceProof;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\ServiceProof\GetServiceProofRequestResponse;
use PHPUnit\Framework\TestCase;

final class GetServiceProofRequestResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'service_proof_request' => [
                    'request_id' => 'SPR123456',
                    'purchase_id' => 'P789012',
                    'status' => 'pending',
                    'requested_at' => '2024-01-15 10:00:00',
                    'proof_type' => 'delivery_confirmation',
                ],
            ],
        ];
        $response = GetServiceProofRequestResponse::fromArray($data);

        $this->assertInstanceOf(GetServiceProofRequestResponse::class, $response);
        $this->assertSame('SPR123456', $response->getServiceProofRequest()['request_id']);
        $this->assertSame('pending', $response->getServiceProofRequest()['status']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'service_proof_request' => [
                        'request_id' => 'SPR999',
                        'status' => 'completed',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetServiceProofRequestResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetServiceProofRequestResponse::class, $response);
        $this->assertSame('SPR999', $response->getServiceProofRequest()['request_id']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'service_proof_request' => [],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetServiceProofRequestResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
