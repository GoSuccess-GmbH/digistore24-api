<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Rebilling;

use GoSuccess\Digistore24\Api\DTO\RebillingData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Rebilling\StopRebillingResponse;
use PHPUnit\Framework\TestCase;

final class StopRebillingResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'modified' => 'Y',
                'note' => 'Rebilling stopped immediately',
                'code' => 'stopped_now',
                'billing_status' => 'aborted',
                'billing_status_msg' => 'Aborted',
                'rebilling_active' => 'N',
                'is_cancelled_now' => 'Y',
                'is_cancelled_later' => 'N',
                'can_cancel_before' => '2025-12-03',
            ],
        ];

        $response = StopRebillingResponse::fromArray($data);

        $this->assertInstanceOf(StopRebillingResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertTrue($response->wasSuccessful());
        $this->assertInstanceOf(RebillingData::class, $response->data);
        $this->assertTrue($response->data->modified);
        $this->assertFalse($response->data->rebillingActive);
        $this->assertSame('stopped_now', $response->data->code);
        $this->assertTrue($response->data->isCancelledNow);
        $this->assertFalse($response->data->isCancelledLater);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'modified' => 'Y',
                    'code' => 'stopped_later',
                    'rebilling_active' => 'Y',
                    'is_cancelled_now' => 'N',
                    'is_cancelled_later' => 'Y',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = StopRebillingResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(StopRebillingResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertNotNull($response->data);
        $this->assertTrue($response->data->rebillingActive);
        $this->assertFalse($response->data->isCancelledNow);
        $this->assertTrue($response->data->isCancelledLater);
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

        $response = StopRebillingResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
