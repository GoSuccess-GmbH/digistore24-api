<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ServiceProof;

use GoSuccess\Digistore24\Api\Request\ServiceProof\UpdateServiceProofRequestRequest;
use PHPUnit\Framework\TestCase;

final class UpdateServiceProofRequestRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            data: ['status' => 'approved']
        );
        
        $this->assertInstanceOf(UpdateServiceProofRequestRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            data: ['status' => 'approved']
        );
        
        $this->assertSame('/updateServiceProofRequest', $request->getEndpoint());
    }

    public function test_to_array_includes_id_and_data(): void
    {
        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            data: ['status' => 'approved', 'comment' => 'Looks good']
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('SPR123', $array['service_proof_request_id']);
        $this->assertSame('approved', $array['status']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            data: ['status' => 'approved']
        );
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

