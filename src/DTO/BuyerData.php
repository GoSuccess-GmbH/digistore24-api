<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Enum\Salutation;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Buyer Data Transfer Object
 *
 * Represents buyer information for API requests and responses.
 * Uses PHP 8.4 property hooks for automatic validation.
 */
final readonly class BuyerData
{
    /**
     * @param string|null $id Buyer ID
     * @param string|null $addressId Address ID
     * @param string $email Email address
     * @param string|null $salutation Salutation (raw string from API)
     * @param string|null $salutationMsg Salutation message
     * @param string|null $title Title (e.g., Dr., Prof.)
     * @param string|null $firstName First name
     * @param string|null $lastName Last name
     * @param string|null $company Company name
     * @param string|null $street Full street address
     * @param string|null $streetName Street name (without number)
     * @param string|null $streetNumber Street number
     * @param string|null $street2 Additional address line
     * @param string|null $city City
     * @param string|null $zipcode ZIP/Postal code
     * @param string|null $state State/Province
     * @param string|null $country Country code (ISO 3166-1 alpha-2)
     * @param string|null $phoneNo Phone number
     * @param string|null $taxId Tax ID
     * @param string|null $buyerType Buyer type (business or private)
     * @param DateTimeImmutable|null $createdAt Creation timestamp
     * @param string|null $readonlyKeys Readonly keys (comma-separated)
     */
    public function __construct(
        public ?string $id = null,
        public ?string $addressId = null,
        public string $email = '',
        public ?string $salutation = null,
        public ?string $salutationMsg = null,
        public ?string $title = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $company = null,
        public ?string $street = null,
        public ?string $streetName = null,
        public ?string $streetNumber = null,
        public ?string $street2 = null,
        public ?string $city = null,
        public ?string $zipcode = null,
        public ?string $state = null,
        public ?string $country = null,
        public ?string $phoneNo = null,
        public ?string $taxId = null,
        public ?string $buyerType = null,
        public ?DateTimeImmutable $createdAt = null,
        public ?string $readonlyKeys = null,
    ) {
    }

    /**
     * Create from API response array
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: TypeConverter::toString($data['id'] ?? null),
            addressId: TypeConverter::toString($data['address_id'] ?? null),
            email: TypeConverter::toString($data['email'] ?? null) ?? '',
            salutation: TypeConverter::toString($data['salutation'] ?? null),
            salutationMsg: TypeConverter::toString($data['salutation_msg'] ?? null),
            title: TypeConverter::toString($data['title'] ?? null),
            firstName: TypeConverter::toString($data['first_name'] ?? null),
            lastName: TypeConverter::toString($data['last_name'] ?? null),
            company: TypeConverter::toString($data['company'] ?? null),
            street: TypeConverter::toString($data['street'] ?? null),
            streetName: TypeConverter::toString($data['street_name'] ?? null),
            streetNumber: TypeConverter::toString($data['street_number'] ?? null),
            street2: TypeConverter::toString($data['street2'] ?? null),
            city: TypeConverter::toString($data['city'] ?? null),
            zipcode: TypeConverter::toString($data['zipcode'] ?? null),
            state: TypeConverter::toString($data['state'] ?? null),
            country: TypeConverter::toString($data['country'] ?? null),
            phoneNo: TypeConverter::toString($data['phone_no'] ?? null),
            taxId: TypeConverter::toString($data['tax_id'] ?? null),
            buyerType: TypeConverter::toString($data['buyer_type'] ?? null),
            createdAt: TypeConverter::toDateTime($data['created_at'] ?? null),
            readonlyKeys: TypeConverter::toString($data['readonly_keys'] ?? null),
        );
    }
}
