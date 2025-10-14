<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\UpdateAffiliateCommissionRequest;
use PHPUnit\Framework\TestCase;

final class UpdateAffiliateCommissionRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateAffiliateCommissionRequest();
        $this->assertInstanceOf(UpdateAffiliateCommissionRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdateAffiliateCommissionRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdateAffiliateCommissionRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdateAffiliateCommissionRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

