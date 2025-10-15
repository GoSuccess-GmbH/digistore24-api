<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\OrderForm;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\OrderForm\UpdateOrderformResponse;
use PHPUnit\Framework\TestCase;

final class UpdateOrderformResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
        ];
        $response = UpdateOrderformResponse::fromArray($data);

        $this->assertInstanceOf(UpdateOrderformResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('success', $response->getResult());
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

        $response = UpdateOrderformResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(UpdateOrderformResponse::class, $response);
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

        $response = UpdateOrderformResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
