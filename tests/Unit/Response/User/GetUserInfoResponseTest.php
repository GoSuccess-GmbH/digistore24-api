<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\User;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\User\GetUserInfoResponse;
use PHPUnit\Framework\TestCase;

final class GetUserInfoResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'user_id' => '12345',
                'email' => 'vendor@example.com',
                'first_name' => 'John',
                'last_name' => 'Vendor',
                'company_name' => 'Vendor Corp',
                'account_type' => 'premium',
            ],
        ];
        $response = GetUserInfoResponse::fromArray($data);

        $this->assertInstanceOf(GetUserInfoResponse::class, $response);
        $this->assertSame('12345', $response->userInfo['user_id']);
        $this->assertSame('vendor@example.com', $response->userInfo['email']);
        $this->assertSame('premium', $response->userInfo['account_type']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'user_id' => '67890',
                    'email' => 'test@vendor.com',
                    'first_name' => 'Jane',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetUserInfoResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetUserInfoResponse::class, $response);
        $this->assertSame('67890', $response->userInfo['user_id']);
        $this->assertSame('Jane', $response->userInfo['first_name']);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'user_id' => '11111',
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetUserInfoResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
