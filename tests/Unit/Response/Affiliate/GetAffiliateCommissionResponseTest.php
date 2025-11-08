<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Affiliate;

use GoSuccess\Digistore24\Api\DTO\AffiliationData;
use GoSuccess\Digistore24\Api\Enum\AffiliateApprovalStatus;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetAffiliateCommissionResponse;
use PHPUnit\Framework\TestCase;

final class GetAffiliateCommissionResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'affiliations' => [
                    [
                        'commission_rate' => '10.00',
                        'commission_currency' => 'EUR',
                        'default_commission_rate' => '10.00',
                        'default_commission_fix' => '0.00',
                        'default_commission_currency' => 'EUR',
                        'commission_fix' => '0.00',
                        'is_on_first_pmnt_only' => '',
                        'product_id' => '14137',
                        'product_is_active' => 'N',
                        'approval_status' => 'approved',
                        'approval_status_msg' => 'Genehmigt',
                    ],
                    [
                        'commission_rate' => '50.00',
                        'commission_currency' => 'EUR',
                        'default_commission_rate' => '50.00',
                        'default_commission_fix' => '0.00',
                        'default_commission_currency' => 'EUR',
                        'commission_fix' => '0.00',
                        'is_on_first_pmnt_only' => 'Y',
                        'product_id' => '406040',
                        'product_is_active' => 'Y',
                        'approval_status' => 'pending',
                        'approval_status_msg' => 'Warte ...',
                    ],
                ],
                'affiliate_id' => '918',
                'affiliate_name' => 'GoSuccess',
            ],
        ];

        $response = GetAffiliateCommissionResponse::fromArray($data);

        $this->assertInstanceOf(GetAffiliateCommissionResponse::class, $response);
        $this->assertSame('918', $response->affiliateId);
        $this->assertSame('GoSuccess', $response->affiliateName);
        $this->assertCount(2, $response->affiliations);

        $firstAffiliation = $response->affiliations[0];
        $this->assertInstanceOf(AffiliationData::class, $firstAffiliation);
        $this->assertSame('10.00', $firstAffiliation->commissionRate);
        $this->assertSame('EUR', $firstAffiliation->commissionCurrency);
        $this->assertSame('14137', $firstAffiliation->productId);
        $this->assertFalse($firstAffiliation->productIsActive);
        $this->assertFalse($firstAffiliation->isOnFirstPmntOnly);
        $this->assertSame(AffiliateApprovalStatus::APPROVED, $firstAffiliation->approvalStatus);
        $this->assertSame('Genehmigt', $firstAffiliation->approvalStatusMsg);

        $secondAffiliation = $response->affiliations[1];
        $this->assertSame('50.00', $secondAffiliation->commissionRate);
        $this->assertSame('406040', $secondAffiliation->productId);
        $this->assertTrue($secondAffiliation->productIsActive);
        $this->assertTrue($secondAffiliation->isOnFirstPmntOnly);
        $this->assertSame(AffiliateApprovalStatus::PENDING, $secondAffiliation->approvalStatus);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'affiliations' => [
                        [
                            'commission_rate' => '20.00',
                            'commission_currency' => 'USD',
                            'default_commission_rate' => '20.00',
                            'default_commission_fix' => '5.00',
                            'default_commission_currency' => 'USD',
                            'commission_fix' => '5.00',
                            'is_on_first_pmnt_only' => 'N',
                            'product_id' => '12345',
                            'product_is_active' => 'Y',
                            'approval_status' => 'approved',
                            'approval_status_msg' => 'Approved',
                        ],
                    ],
                    'affiliate_id' => '123',
                    'affiliate_name' => 'Test Affiliate',
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetAffiliateCommissionResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetAffiliateCommissionResponse::class, $response);
        $this->assertSame('123', $response->affiliateId);
        $this->assertSame('Test Affiliate', $response->affiliateName);
        $this->assertCount(1, $response->affiliations);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'affiliations' => [],
                    'affiliate_id' => '999',
                    'affiliate_name' => 'Test',
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetAffiliateCommissionResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }

    public function test_handles_empty_affiliations(): void
    {
        $data = [
            'data' => [
                'affiliations' => [],
                'affiliate_id' => '456',
                'affiliate_name' => 'Empty Affiliate',
            ],
        ];

        $response = GetAffiliateCommissionResponse::fromArray($data);

        $this->assertSame('456', $response->affiliateId);
        $this->assertSame('Empty Affiliate', $response->affiliateName);
        $this->assertCount(0, $response->affiliations);
    }

    public function test_handles_missing_data(): void
    {
        $data = [
            'data' => [
                'affiliations' => [],
            ],
        ];

        $response = GetAffiliateCommissionResponse::fromArray($data);

        $this->assertSame('', $response->affiliateId);
        $this->assertSame('', $response->affiliateName);
        $this->assertCount(0, $response->affiliations);
    }
}
