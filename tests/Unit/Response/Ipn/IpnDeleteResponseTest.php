<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Ipn;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnDeleteResponse;
use PHPUnit\Framework\TestCase;

final class IpnDeleteResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
        ];
        $response = IpnDeleteResponse::fromArray($data);

        $this->assertInstanceOf(IpnDeleteResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
            ],
            headers: [],
            rawBody: '',
        );

        $response = IpnDeleteResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(IpnDeleteResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = IpnDeleteResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
