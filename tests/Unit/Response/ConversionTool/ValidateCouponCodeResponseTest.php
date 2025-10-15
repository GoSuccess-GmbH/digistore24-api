<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\ConversionTool;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\ConversionTool\ValidateCouponCodeResponse;
use PHPUnit\Framework\TestCase;

final class ValidateCouponCodeResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'status' => 'success',
                'code' => 'SAVE20',
                'discount' => 20,
            ],
        ];
        $response = ValidateCouponCodeResponse::fromArray($data);

        $this->assertInstanceOf(ValidateCouponCodeResponse::class, $response);
        $this->assertSame('success', $response->getStatus());
        $this->assertTrue($response->isValid());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'status' => 'success',
                    'code' => 'SAVE20',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ValidateCouponCodeResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ValidateCouponCodeResponse::class, $response);
        $this->assertTrue($response->isValid());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = ValidateCouponCodeResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
