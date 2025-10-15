<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Response\Purchase\ResendPurchaseConfirmationMailResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use PHPUnit\Framework\TestCase;

final class ResendPurchaseConfirmationMailResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'modified' => 'Y',
                'note' => 'Confirmation email resent successfully',
            ],
        ];
        $response = ResendPurchaseConfirmationMailResponse::fromArray($data);
        
        $this->assertInstanceOf(ResendPurchaseConfirmationMailResponse::class, $response);
        $this->assertSame('Y', $response->getModified());
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('Confirmation email resent successfully', $response->getNote());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'modified' => 'Y',
                    'note' => null,
                ],
            ],
            headers: [],
            rawBody: ''
        );
        
        $response = ResendPurchaseConfirmationMailResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(ResendPurchaseConfirmationMailResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertNull($response->getNote());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'modified' => 'Y',
                    'note' => 'Email sent',
                ],
            ],
            headers: [],
            rawBody: 'test'
        );
        
        $response = ResendPurchaseConfirmationMailResponse::fromResponse($httpResponse);
        
        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}

