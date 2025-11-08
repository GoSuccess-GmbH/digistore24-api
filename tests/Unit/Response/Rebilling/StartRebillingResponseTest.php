<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Rebilling;

use GoSuccess\Digistore24\Api\DTO\RebillingData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Rebilling\StartRebillingResponse;
use PHPUnit\Framework\TestCase;

final class StartRebillingResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'modified' => 'Y',
                'note' => 'Rebilling started',
                'billing_status' => 'paying',
                'billing_status_msg' => 'Currently paying',
                'next_payment_at' => '2025-12-31 14:47:00',
                'rebilling_active' => 'Y',
            ],
        ];

        $response = StartRebillingResponse::fromArray($data);

        $this->assertInstanceOf(StartRebillingResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertInstanceOf(RebillingData::class, $response->data);
        $this->assertTrue($response->data->modified);
        $this->assertTrue($response->data->rebillingActive);
        $this->assertSame('paying', $response->data->billingStatus);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'modified' => 'N',
                    'note' => 'Already active',
                    'rebilling_active' => 'Y',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = StartRebillingResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(StartRebillingResponse::class, $response);
        $this->assertNotNull($response->data);
        $this->assertFalse($response->data->modified);
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

        $response = StartRebillingResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
