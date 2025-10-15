<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Buyer;

use GoSuccess\Digistore24\Api\Request\Buyer\GetBuyerRequest;
use PHPUnit\Framework\TestCase;

final class GetBuyerRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetBuyerRequest(buyerId: 'B12345');
        
        $this->assertInstanceOf(GetBuyerRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetBuyerRequest(buyerId: 'B12345');
        
        $this->assertSame('/getBuyer', $request->getEndpoint());
    }

    public function test_to_array_includes_buyer_id(): void
    {
        $request = new GetBuyerRequest(buyerId: 'B12345');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('B12345', $array['buyer_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetBuyerRequest(buyerId: 'B12345');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

