<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\GetReferringAffiliateRequest;
use PHPUnit\Framework\TestCase;

final class GetReferringAffiliateRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetReferringAffiliateRequest();
        $this->assertInstanceOf(GetReferringAffiliateRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetReferringAffiliateRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetReferringAffiliateRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetReferringAffiliateRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

