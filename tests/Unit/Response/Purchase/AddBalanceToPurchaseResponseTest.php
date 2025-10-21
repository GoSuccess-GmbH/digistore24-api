<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Purchase\AddBalanceToPurchaseResponse;
use PHPUnit\Framework\TestCase;

final class AddBalanceToPurchaseResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'old_balance' => 25.50,
                'new_balance' => 75.50,
            ],
        ];
        $response = AddBalanceToPurchaseResponse::fromArray($data);

        $this->assertInstanceOf(AddBalanceToPurchaseResponse::class, $response);
        $this->assertSame(25.50, $response->oldBalance);
        $this->assertSame(75.50, $response->newBalance);
        $this->assertSame(50.00, $response->getBalanceChange());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['old_balance' => 50.00, 'new_balance' => 100.00]],
            headers: [],
            rawBody: '',
        );

        $response = AddBalanceToPurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(AddBalanceToPurchaseResponse::class, $response);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['old_balance' => 50.00, 'new_balance' => 100.00]],
            headers: [],
            rawBody: 'test',
        );

        $response = AddBalanceToPurchaseResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
