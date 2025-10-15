<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\PaymentPlan\ListPaymentPlansResponse;
use PHPUnit\Framework\TestCase;

final class ListPaymentPlansResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'payment_plans' => [
                    [
                        'paymentplan_id' => 'PP001',
                        'name' => 'Monthly Plan',
                        'price' => 29.99,
                    ],
                    [
                        'paymentplan_id' => 'PP002',
                        'name' => 'Yearly Plan',
                        'price' => 299.99,
                    ],
                ],
            ],
        ];
        $response = ListPaymentPlansResponse::fromArray($data);

        $this->assertInstanceOf(ListPaymentPlansResponse::class, $response);
        $this->assertCount(2, $response->getPaymentPlans());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'payment_plans' => [
                        [
                            'paymentplan_id' => 'PP003',
                            'name' => 'Lifetime Plan',
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListPaymentPlansResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListPaymentPlansResponse::class, $response);
        $this->assertCount(1, $response->getPaymentPlans());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = ListPaymentPlansResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
