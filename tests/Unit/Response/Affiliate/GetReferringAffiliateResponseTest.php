<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetReferringAffiliateResponse;
use PHPUnit\Framework\TestCase;

final class GetReferringAffiliateResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'affiliate_id' => 'REF12345',
            ],
        ];
        $response = GetReferringAffiliateResponse::fromArray($data);

        $this->assertInstanceOf(GetReferringAffiliateResponse::class, $response);
        $this->assertSame('REF12345', $response->getAffiliateId());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'affiliate_id' => 'REF12345',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetReferringAffiliateResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetReferringAffiliateResponse::class, $response);
        $this->assertSame('REF12345', $response->getAffiliateId());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = GetReferringAffiliateResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
