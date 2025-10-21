<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\AccountAccess;

use GoSuccess\Digistore24\Api\DTO\AccountAccessData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\AccountAccess\ListAccountAccessResponse;
use PHPUnit\Framework\TestCase;

final class ListAccountAccessResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'by_me' => [
                    [
                        'id' => 51,
                        'owner_id' => 3599,
                        'accessor_id' => 4469,
                        'permissions' => 'can_full_access',
                        'permissions_msg' => 'Full access',
                        'created_at' => '2013-12-09 15:15:56',
                        'modified_at' => '2020-04-29 14:06:34',
                        'can_see_non_affiliate_purchases' => 'Y',
                        'can_approve_affiliations' => 'Y',
                        'can_see_edit_marketplace_link' => 'Y',
                        'can_edit_products' => 'Y',
                        'can_edit_affiliate_commissions' => 'Y',
                        'can_read_mail_history' => 'Y',
                        'can_approve_purchases' => 'Y',
                        'can_edit_purchases_approval_policy' => 'Y',
                        'can_give_permissions' => 'N',
                        'can_see_revenue' => 'Y',
                        'can_edit_discount_vouchers' => 'Y',
                        'can_csv_export' => 'Y',
                    ],
                ],
                'to_me' => [
                    [
                        'id' => 63,
                        'owner_id' => 4469,
                        'accessor_id' => 3599,
                        'permissions' => 'can_full_access',
                        'permissions_msg' => 'Full access',
                        'created_at' => '2014-01-02 13:33:13',
                        'modified_at' => '2020-06-21 23:58:18',
                        'can_see_non_affiliate_purchases' => 'Y',
                        'can_approve_affiliations' => 'Y',
                        'can_see_edit_marketplace_link' => 'Y',
                        'can_edit_products' => 'Y',
                        'can_edit_affiliate_commissions' => 'Y',
                        'can_read_mail_history' => 'Y',
                        'can_approve_purchases' => 'Y',
                        'can_edit_purchases_approval_policy' => 'Y',
                        'can_give_permissions' => 'N',
                        'can_see_revenue' => 'Y',
                        'can_edit_discount_vouchers' => 'Y',
                        'can_csv_export' => 'Y',
                    ],
                ],
            ],
        ];

        $response = ListAccountAccessResponse::fromArray($data);

        $this->assertCount(1, $response->byMe);
        $this->assertCount(1, $response->toMe);
        $this->assertInstanceOf(AccountAccessData::class, $response->byMe[0]);
        $this->assertInstanceOf(AccountAccessData::class, $response->toMe[0]);
        $this->assertSame(51, $response->byMe[0]->id);
        $this->assertSame(63, $response->toMe[0]->id);
        $this->assertTrue($response->byMe[0]->canSeeRevenue);
        $this->assertFalse($response->byMe[0]->canGivePermissions);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'by_me' => [
                        [
                            'id' => 100,
                            'owner_id' => 1000,
                            'accessor_id' => 2000,
                            'permissions' => 'can_read_only',
                            'permissions_msg' => 'Read only',
                            'created_at' => '2024-01-01 12:00:00',
                            'modified_at' => '2024-01-02 12:00:00',
                            'can_see_non_affiliate_purchases' => 'N',
                            'can_approve_affiliations' => 'N',
                            'can_see_edit_marketplace_link' => 'N',
                            'can_edit_products' => 'N',
                            'can_edit_affiliate_commissions' => 'N',
                            'can_read_mail_history' => 'Y',
                            'can_approve_purchases' => 'N',
                            'can_edit_purchases_approval_policy' => 'N',
                            'can_give_permissions' => 'N',
                            'can_see_revenue' => 'N',
                            'can_edit_discount_vouchers' => 'N',
                            'can_csv_export' => 'N',
                        ],
                    ],
                    'to_me' => [],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = ListAccountAccessResponse::fromResponse($httpResponse);

        $this->assertCount(1, $response->byMe);
        $this->assertCount(0, $response->toMe);
        $this->assertSame(100, $response->byMe[0]->id);
        $this->assertTrue($response->byMe[0]->canReadMailHistory);
        $this->assertFalse($response->byMe[0]->canSeeRevenue);
    }

    public function test_handles_empty_arrays(): void
    {
        $data = ['data' => ['by_me' => [], 'to_me' => []]];

        $response = ListAccountAccessResponse::fromArray($data);

        $this->assertCount(0, $response->byMe);
        $this->assertCount(0, $response->toMe);
    }

    public function test_handles_missing_keys(): void
    {
        $data = ['data' => []];

        $response = ListAccountAccessResponse::fromArray($data);

        $this->assertCount(0, $response->byMe);
        $this->assertCount(0, $response->toMe);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: ['data' => ['by_me' => [], 'to_me' => []]],
            headers: [],
            rawBody: 'test',
        );

        $response = ListAccountAccessResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
