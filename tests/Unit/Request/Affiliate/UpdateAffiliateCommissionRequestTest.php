<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\UpdateAffiliateCommissionRequest;
use PHPUnit\Framework\TestCase;

final class UpdateAffiliateCommissionRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateAffiliateCommissionRequest(
            productId: 12345,
            affiliateId: 'AFF123',
            data: ['commission' => 10.5]
        );
        
        $this->assertInstanceOf(UpdateAffiliateCommissionRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdateAffiliateCommissionRequest(
            productId: 12345,
            affiliateId: 'AFF123',
            data: ['commission' => 10.5]
        );
        
        $this->assertSame('/updateAffiliateCommission', $request->getEndpoint());
    }

    public function test_to_array_includes_all_data(): void
    {
        $request = new UpdateAffiliateCommissionRequest(
            productId: 12345,
            affiliateId: 'AFF123',
            data: ['commission' => 10.5, 'type' => 'percent']
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame(12345, $array['product_id']);
        $this->assertSame('AFF123', $array['affiliate_id']);
        $this->assertSame(10.5, $array['commission']);
        $this->assertSame('percent', $array['type']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdateAffiliateCommissionRequest(
            productId: 12345,
            affiliateId: 'AFF123',
            data: ['commission' => 10.5]
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

