<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Upgrade;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Upgrade\CreateUpgradeResponse;
use PHPUnit\Framework\TestCase;

final class CreateUpgradeResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'upgrade_id' => 'UPG123456',
                'from_product_id' => '100',
                'to_product_id' => '200',
                'price_difference' => 50.00,
            ],
        ];
        $response = CreateUpgradeResponse::fromArray($data);

        $this->assertInstanceOf(CreateUpgradeResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('UPG123456', $response->getUpgradeId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'upgrade_id' => 'UPG999',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = CreateUpgradeResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(CreateUpgradeResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
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

        $response = CreateUpgradeResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
