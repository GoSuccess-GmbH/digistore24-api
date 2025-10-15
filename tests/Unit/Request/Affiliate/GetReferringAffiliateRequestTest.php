<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\GetReferringAffiliateRequest;
use PHPUnit\Framework\TestCase;

final class GetReferringAffiliateRequestTest extends TestCase
{
    public function test_can_create_instance_with_purchase_id(): void
    {
        $request = new GetReferringAffiliateRequest(purchaseId: 'P12345');
        
        $this->assertInstanceOf(GetReferringAffiliateRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetReferringAffiliateRequest(purchaseId: 'P12345');
        
        $this->assertSame('/getReferringAffiliate', $request->getEndpoint());
    }

    public function test_to_array_returns_correct_data(): void
    {
        $request = new GetReferringAffiliateRequest(purchaseId: 'P12345');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetReferringAffiliateRequest(purchaseId: 'P12345');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

