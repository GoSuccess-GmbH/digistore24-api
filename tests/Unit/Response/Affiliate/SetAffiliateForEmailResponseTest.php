<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\Response\Affiliate\SetAffiliateForEmailResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class SetAffiliateForEmailResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [];
        $response = SetAffiliateForEmailResponse::fromArray($data);
        
        $this->assertInstanceOf(SetAffiliateForEmailResponse::class, $response);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: ''
        );
        
        $response = SetAffiliateForEmailResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(SetAffiliateForEmailResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test'
        );
        
        $response = SetAffiliateForEmailResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->getRawResponse());
    }
}

