<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\ValidateAffiliateRequest;
use PHPUnit\Framework\TestCase;

final class ValidateAffiliateRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ValidateAffiliateRequest();
        $this->assertInstanceOf(ValidateAffiliateRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new ValidateAffiliateRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ValidateAffiliateRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ValidateAffiliateRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

