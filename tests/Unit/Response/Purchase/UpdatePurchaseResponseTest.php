<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Purchase\UpdatePurchaseResponse;
use PHPUnit\Framework\TestCase;

final class UpdatePurchaseResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'is_modified' => 'Y',
            ],
        ];
        $response = UpdatePurchaseResponse::fromArray($data);

        $this->assertInstanceOf(UpdatePurchaseResponse::class, $response);
        $this->assertSame('Y', $response->getIsModified());
        $this->assertTrue($response->wasModified());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'is_modified' => 'Y',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = UpdatePurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(UpdatePurchaseResponse::class, $response);
        $this->assertTrue($response->wasModified());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'is_modified' => 'Y',
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = UpdatePurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
