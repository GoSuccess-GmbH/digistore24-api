<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Ipn;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnSetupResponse;
use PHPUnit\Framework\TestCase;

final class IpnSetupResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'ipn_id' => 'IPN123',
                'url' => 'https://example.com/ipn',
            ],
        ];
        $response = IpnSetupResponse::fromArray($data);

        $this->assertInstanceOf(IpnSetupResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->wasSuccessful());
        $this->assertArrayHasKey('ipn_id', $response->data);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'ipn_id' => 'IPN456',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = IpnSetupResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(IpnSetupResponse::class, $response);
        $this->assertArrayHasKey('ipn_id', $response->data);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = IpnSetupResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
