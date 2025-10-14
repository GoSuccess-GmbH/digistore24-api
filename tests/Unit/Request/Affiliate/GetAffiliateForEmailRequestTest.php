<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateForEmailRequest;
use PHPUnit\Framework\TestCase;

final class GetAffiliateForEmailRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetAffiliateForEmailRequest();
        $this->assertInstanceOf(GetAffiliateForEmailRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new GetAffiliateForEmailRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new GetAffiliateForEmailRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new GetAffiliateForEmailRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

