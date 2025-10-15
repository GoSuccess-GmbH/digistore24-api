<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ServiceProof;

use GoSuccess\Digistore24\Api\Request\ServiceProof\ListServiceProofRequestsRequest;
use PHPUnit\Framework\TestCase;

final class ListServiceProofRequestsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListServiceProofRequestsRequest();

        $this->assertInstanceOf(ListServiceProofRequestsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListServiceProofRequestsRequest();

        $this->assertSame('/listServiceProofRequests', $request->getEndpoint());
    }

    public function test_to_array_with_pagination(): void
    {
        $request = new ListServiceProofRequestsRequest(limit: 50, offset: 10);

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame(50, $array['limit']);
        $this->assertSame(10, $array['offset']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListServiceProofRequestsRequest();

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
