<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Rebilling;

use GoSuccess\Digistore24\Api\Response\Rebilling\ListRebillingStatusChangesResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ListRebillingStatusChangesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'status_changes' => [
                    [
                        'change_id' => 'CHG001',
                        'purchase_id' => 'P123456',
                        'old_status' => 'active',
                        'new_status' => 'paused',
                        'changed_at' => '2024-01-15 10:00:00',
                    ],
                    [
                        'change_id' => 'CHG002',
                        'purchase_id' => 'P123456',
                        'old_status' => 'paused',
                        'new_status' => 'active',
                        'changed_at' => '2024-02-01 12:00:00',
                    ],
                ],
            ],
        ];
        $response = ListRebillingStatusChangesResponse::fromArray($data);
        
        $this->assertInstanceOf(ListRebillingStatusChangesResponse::class, $response);
        $this->assertIsArray($response->getStatusChanges());
        $this->assertCount(2, $response->getStatusChanges());
        $this->assertSame('CHG001', $response->getStatusChanges()[0]['change_id']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'status_changes' => [
                        [
                            'change_id' => 'CHG999',
                            'purchase_id' => 'P999999',
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ListRebillingStatusChangesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ListRebillingStatusChangesResponse::class, $response);
        $this->assertCount(1, $response->getStatusChanges());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'status_changes' => [],
                ],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ListRebillingStatusChangesResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

