<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\ValidateAffiliateResponse;
use PHPUnit\Framework\TestCase;

final class ValidateAffiliateResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'is_valid' => true,
                'affiliate_id' => 'AFF123',
            ],
        ];
        $response = ValidateAffiliateResponse::fromArray($data);

        $this->assertInstanceOf(ValidateAffiliateResponse::class, $response);
        $this->assertTrue($response->isValid());
        $this->assertArrayHasKey('is_valid', $response->getData());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'is_valid' => true,
                    'affiliate_id' => 'AFF123',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ValidateAffiliateResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ValidateAffiliateResponse::class, $response);
        $this->assertTrue($response->isValid());
        $this->assertArrayHasKey('is_valid', $response->getData());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = ValidateAffiliateResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
