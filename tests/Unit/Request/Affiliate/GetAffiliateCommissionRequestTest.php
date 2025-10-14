<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateCommissionRequest;
use PHPUnit\Framework\TestCase;

final class GetAffiliateCommissionRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetAffiliateCommissionRequest();
        $this->assertInstanceOf(GetAffiliateCommissionRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetAffiliateCommissionRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetAffiliateCommissionRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetAffiliateCommissionRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

