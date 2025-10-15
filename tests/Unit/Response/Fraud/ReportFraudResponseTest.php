<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Fraud;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Fraud\ReportFraudResponse;
use PHPUnit\Framework\TestCase;

final class ReportFraudResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'buyer_status' => 'success',
                'buyer_message' => 'Buyer reported',
                'buyer_code' => 'created_entry',
                'affiliate_status' => 'success',
                'affiliate_message' => 'Affiliate reported',
                'affiliate_code' => 'created_entry',
            ],
        ];
        $response = ReportFraudResponse::fromArray($data);

        $this->assertInstanceOf(ReportFraudResponse::class, $response);
        $this->assertSame('success', $response->getResult());
        $this->assertTrue($response->wasSuccessful());
        $this->assertSame('created_entry', $response->getBuyerCode());
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'buyer_status' => 'success',
                    'buyer_message' => 'Buyer reported',
                    'buyer_code' => 'created_entry',
                    'affiliate_status' => 'info',
                    'affiliate_message' => 'Already reported',
                    'affiliate_code' => 'rerequest',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ReportFraudResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ReportFraudResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['result' => 'success'],
            headers: [],
            rawBody: 'test',
        );

        $response = ReportFraudResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
