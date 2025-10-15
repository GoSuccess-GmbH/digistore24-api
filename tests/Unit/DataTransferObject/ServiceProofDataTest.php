<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\Api\DataTransferObject\ServiceProofData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ServiceProofData::class)]
final class ServiceProofDataTest extends TestCase
{
    public function testCanCreateWithProofProvided(): void
    {
        $proof = new ServiceProofData();
        $proof->requestStatus = 'proof_provided';
        $proof->message = 'Service delivered on 2025-01-15';

        $this->assertSame('proof_provided', $proof->requestStatus);
        $this->assertSame('Service delivered on 2025-01-15', $proof->message);
    }

    public function testCanCreateWithExecRefund(): void
    {
        $proof = new ServiceProofData();
        $proof->requestStatus = 'exec_refund';
        $proof->message = 'Refund approved';

        $this->assertSame('exec_refund', $proof->requestStatus);
        $this->assertSame('Refund approved', $proof->message);
    }

    public function testRequestStatusValidationThrowsExceptionForInvalidStatus(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid request status: invalid_status');

        $proof = new ServiceProofData();
        $proof->requestStatus = 'invalid_status';
    }

    public function testFromArrayCreatesInstanceCorrectly(): void
    {
        $data = [
            'request_status' => 'proof_provided',
            'message' => 'Service delivered',
        ];

        $proof = ServiceProofData::fromArray($data);

        $this->assertSame('proof_provided', $proof->requestStatus);
        $this->assertSame('Service delivered', $proof->message);
    }

    public function testToArrayConvertsCorrectly(): void
    {
        $proof = new ServiceProofData();
        $proof->requestStatus = 'exec_refund';
        $proof->message = 'Refund approved';

        $array = $proof->toArray();

        $this->assertSame([
            'request_status' => 'exec_refund',
            'message' => 'Refund approved',
        ], $array);
    }

    public function testMessageIsOptional(): void
    {
        $proof = new ServiceProofData();
        $proof->requestStatus = 'proof_provided';

        $this->assertNull($proof->message);
    }

    public function testToArrayExcludesNullMessage(): void
    {
        $proof = new ServiceProofData();
        $proof->requestStatus = 'proof_provided';

        $array = $proof->toArray();

        $this->assertSame(['request_status' => 'proof_provided'], $array);
        $this->assertArrayNotHasKey('message', $array);
    }
}
