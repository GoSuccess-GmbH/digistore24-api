<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\Api\DTO\BuyerData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BuyerData::class)]
final class BuyerDataTest extends TestCase
{
    public function testCanCreateWithValidEmail(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';

        $this->assertSame('test@example.com', $buyer->email);
    }

    public function testEmailValidationThrowsExceptionForInvalidEmail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email address');

        $buyer = new BuyerData();
        $buyer->email = 'invalid-email';
    }

    public function testCountryIsAutoUppercased(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';
        $buyer->country = 'de';

        $this->assertSame('DE', $buyer->country);
    }

    public function testCountryValidationThrowsExceptionForInvalidLength(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Country must be 2-letter code');

        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';
        $buyer->country = 'DEU'; // 3 letters
    }

    public function testCanSetAllOptionalFields(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';
        $buyer->salutation = 'Mr';
        $buyer->title = 'Dr';
        $buyer->firstName = 'John';
        $buyer->lastName = 'Doe';
        $buyer->company = 'ACME Corp';
        $buyer->street = 'Main Street 1';
        $buyer->city = 'Berlin';
        $buyer->zipcode = '10115';
        $buyer->state = 'Berlin';
        $buyer->country = 'de';
        $buyer->phoneNo = '+49-30-12345678';
        $buyer->taxId = 'DE123456789';

        $this->assertSame('Mr', $buyer->salutation);
        $this->assertSame('Dr', $buyer->title);
        $this->assertSame('John', $buyer->firstName);
        $this->assertSame('Doe', $buyer->lastName);
        $this->assertSame('ACME Corp', $buyer->company);
        $this->assertSame('Main Street 1', $buyer->street);
        $this->assertSame('Berlin', $buyer->city);
        $this->assertSame('10115', $buyer->zipcode);
        $this->assertSame('Berlin', $buyer->state);
        $this->assertSame('DE', $buyer->country); // Uppercased
        $this->assertSame('+49-30-12345678', $buyer->phoneNo);
        $this->assertSame('DE123456789', $buyer->taxId);
    }

    public function testOptionalFieldsCanBeNull(): void
    {
        $buyer = new BuyerData();
        $buyer->email = 'test@example.com';

        $this->assertNull($buyer->salutation);
        $this->assertNull($buyer->firstName);
        $this->assertNull($buyer->country);
    }
}
