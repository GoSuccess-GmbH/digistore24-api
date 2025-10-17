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
            productId: 12345,
            affiliateId: 'ABC123',
        );

        $this->assertInstanceOf(GetAffiliateCommissionRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetAffiliateCommissionRequest(
            productId: 12345,
            affiliateId: 'ABC123',
        );

        $this->assertSame('/getAffiliateCommission', $request->getEndpoint());
    }

    public function test_to_array_returns_correct_data(): void
    {
        $request = new GetAffiliateCommissionRequest(
            productId: 12345,
            affiliateId: 'ABC123',
        );

        $array = $request->toArray();
        $this->assertSame(12345, $array['product_id']);
        $this->assertSame('ABC123', $array['affiliate_id']);
    }

    public function test_validate_returns_empty_array_for_valid_data(): void
    {
        $request = new GetAffiliateCommissionRequest(
            productId: 12345,
            affiliateId: 'ABC123',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
