<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\ValidateAffiliateRequest;
use PHPUnit\Framework\TestCase;

final class ValidateAffiliateRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ValidateAffiliateRequest(affiliateId: 'AFF123');
        
        $this->assertInstanceOf(ValidateAffiliateRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ValidateAffiliateRequest(affiliateId: 'AFF123');
        
        $this->assertSame('/validateAffiliate', $request->getEndpoint());
    }

    public function test_to_array_includes_affiliate_id(): void
    {
        $request = new ValidateAffiliateRequest(affiliateId: 'AFF123');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('AFF123', $array['affiliate_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ValidateAffiliateRequest(affiliateId: 'AFF123');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

