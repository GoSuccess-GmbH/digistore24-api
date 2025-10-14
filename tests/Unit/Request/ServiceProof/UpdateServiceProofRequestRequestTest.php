<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ServiceProof;

use GoSuccess\Digistore24\Api\Request\ServiceProof\UpdateServiceProofRequestRequest;
use PHPUnit\Framework\TestCase;

final class UpdateServiceProofRequestRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateServiceProofRequestRequest();
        $this->assertInstanceOf(UpdateServiceProofRequestRequest::class, $request);
    }

    public function test_endpoint_returns_string(): void
    {
        $request = new UpdateServiceProofRequestRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new UpdateServiceProofRequestRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new UpdateServiceProofRequestRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

