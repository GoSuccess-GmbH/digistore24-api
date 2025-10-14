<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateForEmailRequest;
use PHPUnit\Framework\TestCase;

final class GetAffiliateForEmailRequestTest extends TestCase
{
    public function test_can_create_instance_with_email(): void
    {
        $request = new GetAffiliateForEmailRequest(email: 'test@example.com');
        
        $this->assertInstanceOf(GetAffiliateForEmailRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetAffiliateForEmailRequest(email: 'test@example.com');
        
        $this->assertSame('getAffiliateForEmail', $request->getEndpoint());
    }

    public function test_to_array_returns_correct_data(): void
    {
        $request = new GetAffiliateForEmailRequest(email: 'test@example.com');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('test@example.com', $array['email']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetAffiliateForEmailRequest(email: 'test@example.com');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

