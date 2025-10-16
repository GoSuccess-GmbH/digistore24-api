<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Statistics;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Statistics\StatsAffiliateToplistResponse;
use PHPUnit\Framework\TestCase;

final class StatsAffiliateToplistResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'toplist' => [
                    [
                        'affiliate_id' => 'AFF001',
                        'name' => 'Top Affiliate',
                        'sales_count' => 150,
                        'total_revenue' => 15000.00,
                        'rank' => 1,
                    ],
                    [
                        'affiliate_id' => 'AFF002',
                        'name' => 'Second Affiliate',
                        'sales_count' => 120,
                        'total_revenue' => 12000.00,
                        'rank' => 2,
                    ],
                ],
            ],
        ];
        $response = StatsAffiliateToplistResponse::fromArray($data);

        $this->assertInstanceOf(StatsAffiliateToplistResponse::class, $response);
        $toplist = $response->getToplist();
        $this->assertCount(2, $toplist);
        $this->assertNotEmpty($toplist);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'toplist' => [
                        [
                            'affiliate_id' => 'AFF999',
                            'rank' => 1,
                            'sales_count' => 200,
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = StatsAffiliateToplistResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(StatsAffiliateToplistResponse::class, $response);
        $this->assertCount(1, $response->getToplist());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => []],
            headers: [],
            rawBody: 'test',
        );

        $response = StatsAffiliateToplistResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
