<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\System;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\System\GetGlobalSettingsResponse;
use PHPUnit\Framework\TestCase;

final class GetGlobalSettingsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'result' => 'success',
            'data' => [
                'product_types' => [
                    ['id' => 1, 'name' => 'Digital Product'],
                    ['id' => 2, 'name' => 'Physical Product'],
                ],
                'countries' => [
                    ['code' => 'DE', 'name' => 'Germany'],
                    ['code' => 'AT', 'name' => 'Austria'],
                ],
                'currencies' => [
                    ['code' => 'EUR', 'symbol' => '€', 'name' => 'Euro'],
                    ['code' => 'USD', 'symbol' => '$', 'name' => 'US Dollar'],
                ],
                'languages' => [
                    ['code' => 'de', 'name' => 'Deutsch'],
                    ['code' => 'en', 'name' => 'English'],
                ],
                'payment_methods' => ['paypal', 'credit_card', 'sepa'],
                'vat_rates' => [
                    'DE' => 19.0,
                    'AT' => 20.0,
                ],
            ],
        ];

        $response = GetGlobalSettingsResponse::fromArray(data: $data);

        $this->assertInstanceOf(GetGlobalSettingsResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertCount(2, $response->productTypes);
        $this->assertSame(1, $response->productTypes[0]['id']);
        $this->assertSame('Digital Product', $response->productTypes[0]['name']);
        $this->assertCount(2, $response->countries);
        $this->assertSame('DE', $response->countries[0]['code']);
        $this->assertCount(2, $response->currencies);
        $this->assertSame('EUR', $response->currencies[0]['code']);
        $this->assertSame('€', $response->currencies[0]['symbol']);
        $this->assertCount(2, $response->languages);
        $this->assertCount(3, $response->paymentMethods);
        $this->assertContains('paypal', $response->paymentMethods);
        $this->assertArrayHasKey('DE', $response->vatRates);
        $this->assertSame(19.0, $response->vatRates['DE']);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'product_types' => [
                        ['id' => 3, 'name' => 'Service'],
                    ],
                    'countries' => [
                        ['code' => 'US', 'name' => 'United States'],
                    ],
                    'currencies' => [
                        ['code' => 'GBP', 'symbol' => '£', 'name' => 'British Pound'],
                    ],
                    'languages' => [
                        ['code' => 'es', 'name' => 'Español'],
                    ],
                    'payment_methods' => ['sofort'],
                    'vat_rates' => ['FR' => 20.0],
                ],
            ],
            headers: [],
            rawBody: '{"result":"success"}',
        );

        $response = GetGlobalSettingsResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(GetGlobalSettingsResponse::class, $response);
        $this->assertSame('success', $response->result);
        $this->assertCount(1, $response->productTypes);
        $this->assertSame(3, $response->productTypes[0]['id']);
        $this->assertCount(1, $response->countries);
        $this->assertSame('US', $response->countries[0]['code']);
    }

    public function test_handles_empty_data(): void
    {
        $data = [
            'result' => 'success',
            'data' => [],
        ];

        $response = GetGlobalSettingsResponse::fromArray(data: $data);

        $this->assertInstanceOf(GetGlobalSettingsResponse::class, $response);
        $this->assertIsArray($response->productTypes);
        $this->assertEmpty($response->productTypes);
        $this->assertIsArray($response->countries);
        $this->assertEmpty($response->countries);
        $this->assertIsArray($response->currencies);
        $this->assertEmpty($response->currencies);
        $this->assertIsArray($response->languages);
        $this->assertEmpty($response->languages);
        $this->assertIsArray($response->paymentMethods);
        $this->assertEmpty($response->paymentMethods);
        $this->assertIsArray($response->vatRates);
        $this->assertEmpty($response->vatRates);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'result' => 'success',
                'data' => [
                    'product_types' => [],
                    'countries' => [],
                    'currencies' => [],
                    'languages' => [],
                    'payment_methods' => [],
                    'vat_rates' => [],
                ],
            ],
            headers: ['Content-Type' => 'application/json'],
            rawBody: 'test body',
        );

        $response = GetGlobalSettingsResponse::fromResponse(response: $httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
        $this->assertSame(200, $response->rawResponse->statusCode);
        $this->assertSame('test body', $response->rawResponse->rawBody);
    }
}
