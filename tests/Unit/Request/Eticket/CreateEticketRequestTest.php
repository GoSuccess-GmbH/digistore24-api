<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Eticket;

use GoSuccess\Digistore24\Api\DTO\BuyerData;
use GoSuccess\Digistore24\Api\Request\Eticket\CreateEticketRequest;
use PHPUnit\Framework\TestCase;

final class CreateEticketRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';

        $request = new CreateEticketRequest(
            buyer: $buyer,
            productId: 'P123',
            locationId: 'L456',
            templateId: 'T789',
            date: new \DateTime('2025-12-31'),
        );

        $this->assertInstanceOf(CreateEticketRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';

        $request = new CreateEticketRequest(
            buyer: $buyer,
            productId: 'P123',
            locationId: 'L456',
            templateId: 'T789',
            date: new \DateTime('2025-12-31'),
        );

        $this->assertSame('/createEticket', $request->getEndpoint());
    }

    public function test_validate_returns_empty_array(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';

        $request = new CreateEticketRequest(
            buyer: $buyer,
            productId: 'P123',
            locationId: 'L456',
            templateId: 'T789',
            date: new \DateTime('2025-12-31'),
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
