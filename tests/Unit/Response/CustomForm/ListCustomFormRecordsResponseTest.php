<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\CustomForm;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\CustomForm\ListCustomFormRecordsResponse;
use PHPUnit\Framework\TestCase;

final class ListCustomFormRecordsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'records' => [
                [
                    'form_id' => 1,
                    'id' => 100,
                    'purchase_id' => 'P123',
                    'purchase_item_id' => 10,
                    'product_id' => 12345,
                    'form_no' => 1,
                    'form_count' => 1,
                    'data' => ['field1' => 'value1'],
                    'address' => ['city' => 'Berlin'],
                ],
            ],
        ];
        $response = ListCustomFormRecordsResponse::fromArray($data);

        $this->assertInstanceOf(ListCustomFormRecordsResponse::class, $response);
        $this->assertCount(1, $response->getRecords());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'records' => [
                    [
                        'form_id' => 1,
                        'id' => 100,
                        'purchase_id' => 'P123',
                        'purchase_item_id' => 10,
                        'product_id' => 12345,
                        'form_no' => 1,
                        'form_count' => 1,
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListCustomFormRecordsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListCustomFormRecordsResponse::class, $response);
        $this->assertCount(1, $response->getRecords());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListCustomFormRecordsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
