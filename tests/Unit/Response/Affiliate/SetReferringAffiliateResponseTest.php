<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Response\Affiliate\SetReferringAffiliateResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class SetReferringAffiliateResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = ['result' => 'success'];
        $response = SetReferringAffiliateResponse::fromArray($data);
        
        $this->assertInstanceOf(SetReferringAffiliateResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success'],
            headers: [],
            rawBody: ''
        );
        
        $response = SetReferringAffiliateResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(SetReferringAffiliateResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success'],
            headers: [],
            rawBody: 'test'
        );
        
        $response = SetReferringAffiliateResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

