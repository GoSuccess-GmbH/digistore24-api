<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\SmartUpgrade;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\SmartUpgrade\ListSmartUpgradesResponse;
use PHPUnit\Framework\TestCase;

final class ListSmartUpgradesResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'smartupgrades' => [
                [
                    'smartupgrade_id' => 'SU001',
                    'from_product_id' => '100',
                    'to_product_id' => '200',
                    'upgrade_type' => 'automatic',
                ],
                [
                    'smartupgrade_id' => 'SU002',
                    'from_product_id' => '200',
                    'to_product_id' => '300',
                    'upgrade_type' => 'manual',
                ],
            ],
        ];
        $response = ListSmartUpgradesResponse::fromArray($data);

        $this->assertInstanceOf(ListSmartUpgradesResponse::class, $response);
        $smartupgrades = $response->smartupgrades;
        $this->assertCount(2, $smartupgrades);
        $this->assertNotEmpty($smartupgrades);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'smartupgrades' => [
                    [
                        'smartupgrade_id' => 'SU999',
                        'upgrade_type' => 'automatic',
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListSmartUpgradesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(ListSmartUpgradesResponse::class, $response);
        $this->assertCount(1, $response->smartupgrades);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['smartupgrades' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = ListSmartUpgradesResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
