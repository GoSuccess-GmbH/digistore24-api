<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Eticket\ListEticketTemplatesResponse;
use PHPUnit\Framework\TestCase;

final class ListEticketTemplatesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'templates' => [
                [
                    'template_id' => 'TPL123',
                    'template_name' => 'Standard Ticket',
                    'description' => 'Default ticket template',
                    'preview_url' => 'https://example.com/preview/123',
                ],
            ],
        ];
        $response = ListEticketTemplatesResponse::fromArray($data);

        $this->assertInstanceOf(ListEticketTemplatesResponse::class, $response);
        $this->assertCount(1, $response->templates);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'templates' => [
                    [
                        'template_id' => 'TPL123',
                        'template_name' => 'Standard Ticket',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListEticketTemplatesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListEticketTemplatesResponse::class, $response);
        $this->assertCount(1, $response->templates);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListEticketTemplatesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
