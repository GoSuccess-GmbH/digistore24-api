<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateCommissionRequest;
use PHPUnit\Framework\TestCase;

final class GetAffiliateCommissionRequestTest extends TestCase
{
    public function test_can_create_instance_with_required_parameters(): void
    {
        $request = new GetAffiliateCommissionRequest(
            affiliateId: 'GoSuccess',
        );

        $this->assertInstanceOf(GetAffiliateCommissionRequest::class, $request);
    }

    public function test_can_create_instance_with_product_ids(): void
    {
        $request = new GetAffiliateCommissionRequest(
            affiliateId: 'GoSuccess',
            productIds: '406040,406042',
        );

        $this->assertInstanceOf(GetAffiliateCommissionRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetAffiliateCommissionRequest(
            affiliateId: 'GoSuccess',
        );

        $this->assertSame('/getAffiliateCommission', $request->getEndpoint());
    }

    public function test_to_array_returns_correct_data_with_default_product_ids(): void
    {
        $request = new GetAffiliateCommissionRequest(
            affiliateId: 'GoSuccess',
        );

        $array = $request->toArray();
        $this->assertSame('GoSuccess', $array['affiliate_id']);
        $this->assertSame('all', $array['product_ids']);
    }

    public function test_to_array_returns_correct_data_with_specific_product_ids(): void
    {
        $request = new GetAffiliateCommissionRequest(
            affiliateId: 'GoSuccess',
            productIds: '406040,406042,406043',
        );

        $array = $request->toArray();
        $this->assertSame('GoSuccess', $array['affiliate_id']);
        $this->assertSame('406040,406042,406043', $array['product_ids']);
    }

    public function test_validate_returns_empty_array_for_valid_data(): void
    {
        $request = new GetAffiliateCommissionRequest(
            affiliateId: 'GoSuccess',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
