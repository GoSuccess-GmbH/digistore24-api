<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Ipn;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnSetupResponse;
use PHPUnit\Framework\TestCase;

final class IpnSetupResponseTest extends TestCase
{
    public function test_can_create_from_array_with_real_api_response(): void
    {
        // This is the exact structure from the real DS24 API response
        $data = [
            'result' => 'success',
            'data' => [
                'created' => 'Y',
                'updated' => 'N',
                'deleted' => 'N',
                'domain_id' => 'promer_dev.promer.io',
                'sha_passphrase' => 'ZUXxLG8XzJLWHYuM6SbZTWRtQG5cnG',
                'ipn_config_id' => 293440,
                'ipn_id' => 293440,
            ],
        ];
        $response = IpnSetupResponse::fromArray($data);

        $this->assertInstanceOf(IpnSetupResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->created);
        $this->assertFalse($response->updated);
        $this->assertFalse($response->deleted);
        $this->assertSame('promer_dev.promer.io', $response->domainId);
        $this->assertSame('ZUXxLG8XzJLWHYuM6SbZTWRtQG5cnG', $response->shaPassphrase);
        $this->assertSame(293440, $response->ipnConfigId);
        $this->assertSame(293440, $response->ipnId);
    }

    public function test_can_create_from_array_with_minimal_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [],
        ];
        $response = IpnSetupResponse::fromArray($data);

        $this->assertInstanceOf(IpnSetupResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertNull($response->created);
        $this->assertNull($response->updated);
        $this->assertNull($response->deleted);
        $this->assertNull($response->domainId);
        $this->assertNull($response->shaPassphrase);
        $this->assertNull($response->ipnConfigId);
        $this->assertNull($response->ipnId);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'created' => 'Y',
                    'updated' => 'N',
                    'deleted' => 'N',
                    'domain_id' => 'test.example.com',
                    'sha_passphrase' => 'test123',
                    'ipn_config_id' => 123456,
                    'ipn_id' => 123456,
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = IpnSetupResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(IpnSetupResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->created);
        $this->assertFalse($response->updated);
        $this->assertFalse($response->deleted);
        $this->assertSame('test.example.com', $response->domainId);
        $this->assertSame('test123', $response->shaPassphrase);
        $this->assertSame(123456, $response->ipnConfigId);
        $this->assertSame(123456, $response->ipnId);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = IpnSetupResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
