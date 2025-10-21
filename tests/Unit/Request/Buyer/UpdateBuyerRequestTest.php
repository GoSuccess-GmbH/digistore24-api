<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Buyer;

use GoSuccess\Digistore24\Api\Request\Buyer\UpdateBuyerRequest;
use PHPUnit\Framework\TestCase;

final class UpdateBuyerRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new UpdateBuyerRequest(buyerId: 'B12345');

        $this->assertInstanceOf(UpdateBuyerRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new UpdateBuyerRequest(buyerId: 'B12345');

        $this->assertSame('/updateBuyer', $request->getEndpoint());
    }

    public function test_to_array_includes_buyer_id_only(): void
    {
        $request = new UpdateBuyerRequest(buyerId: 'B12345');

        $array = $request->toArray();
        $this->assertSame('B12345', $array['buyer_id']);
        $this->assertCount(1, $array);
    }

    public function test_to_array_includes_all_optional_data(): void
    {
        $request = new UpdateBuyerRequest(
            buyerId: 'B12345',
            email: 'updated@example.com',
            firstName: 'John',
            lastName: 'Doe',
            address: ['street' => 'Main St', 'city' => 'Berlin'],
        );

        $array = $request->toArray();

        $this->assertSame('B12345', $array['buyer_id']);
        $this->assertSame('updated@example.com', $array['email']);
        $this->assertSame('John', $array['first_name']);
        $this->assertSame('Doe', $array['last_name']);

        $address = $array['address'] ?? null;
        $this->assertIsArray($address);
        /** @var array<string, mixed> $validatedAddress */
        $validatedAddress = $address;
        $this->assertSame('Main St', $validatedAddress['street']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new UpdateBuyerRequest(buyerId: 'B12345');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
