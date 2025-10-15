<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\SetReferringAffiliateRequest;
use PHPUnit\Framework\TestCase;

final class SetReferringAffiliateRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new SetReferringAffiliateRequest(
            purchaseId: 'P12345',
            affiliateId: 'AFF123'
        );
        
        $this->assertInstanceOf(SetReferringAffiliateRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new SetReferringAffiliateRequest(
            purchaseId: 'P12345',
            affiliateId: 'AFF123'
        );
        
        $this->assertSame('/setReferringAffiliate', $request->getEndpoint());
    }

    public function test_to_array_returns_correct_data(): void
    {
        $request = new SetReferringAffiliateRequest(
            purchaseId: 'P12345',
            affiliateId: 'AFF123'
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertSame('AFF123', $array['affiliate_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new SetReferringAffiliateRequest(
            purchaseId: 'P12345',
            affiliateId: 'AFF123'
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

