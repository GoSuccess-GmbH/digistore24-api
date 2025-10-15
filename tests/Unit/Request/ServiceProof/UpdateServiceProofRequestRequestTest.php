<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ServiceProof;

use GoSuccess\Digistore24\Api\DataTransferObject\ServiceProofRequestUpdateData;
use GoSuccess\Digistore24\Api\Request\ServiceProof\UpdateServiceProofRequestRequest;
use PHPUnit\Framework\TestCase;

final class UpdateServiceProofRequestRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $proof = ServiceProofRequestUpdateData::fromArray([
            'data' => ['request_status' => 'proof_provided'],
        ]);

        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            proofData: $proof,
        );

        $this->assertInstanceOf(UpdateServiceProofRequestRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $proof = ServiceProofRequestUpdateData::fromArray([
            'data' => ['request_status' => 'proof_provided'],
        ]);

        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            proofData: $proof,
        );

        $this->assertSame('/updateServiceProofRequest', $request->getEndpoint());
    }

    public function test_to_array_includes_id_and_data(): void
    {
        $proof = ServiceProofRequestUpdateData::fromArray([
            'data' => ['request_status' => 'proof_provided', 'message' => 'Looks good'],
        ]);

        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            proofData: $proof,
        );

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('SPR123', $array['service_proof_request_id']);
        $this->assertSame('proof_provided', $array['data']['request_status']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $proof = ServiceProofRequestUpdateData::fromArray([
            'data' => ['request_status' => 'proof_provided'],
        ]);

        $request = new UpdateServiceProofRequestRequest(
            serviceProofRequestId: 'SPR123',
            proofData: $proof,
        );

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
