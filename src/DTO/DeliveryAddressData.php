<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Delivery Address Data Transfer Object
 *
 * Represents delivery address information.
 * Uses PHP 8.4 property hooks for read-only access.
 */
final class DeliveryAddressData extends AbstractDataTransferObject
{
    public ?string $title {
        get => $this->title;
    }

    public ?string $salutation {
        get => $this->salutation;
    }

    public ?string $company {
        get => $this->company;
    }

    public ?string $firstName {
        get => $this->firstName;
    }

    public ?string $lastName {
        get => $this->lastName;
    }

    public ?string $street {
        get => $this->street;
    }

    public ?string $street2 {
        get => $this->street2;
    }

    public ?string $streetNumber {
        get => $this->streetNumber;
    }

    public ?string $city {
        get => $this->city;
    }

    public ?string $state {
        get => $this->state;
    }

    public ?string $zipcode {
        get => $this->zipcode;
    }

    public ?string $country {
        get => $this->country;
    }

    public ?string $email {
        get => $this->email;
    }

    public ?string $phoneNo {
        get => $this->phoneNo;
    }

    public ?string $taxId {
        get => $this->taxId;
    }

    public ?string $countryName {
        get => $this->countryName;
    }

    public function __construct(
        ?string $title = null,
        ?string $salutation = null,
        ?string $company = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $street = null,
        ?string $street2 = null,
        ?string $streetNumber = null,
        ?string $city = null,
        ?string $state = null,
        ?string $zipcode = null,
        ?string $country = null,
        ?string $email = null,
        ?string $phoneNo = null,
        ?string $taxId = null,
        ?string $countryName = null,
    ) {
        $this->title = $title;
        $this->salutation = $salutation;
        $this->company = $company;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->street = $street;
        $this->street2 = $street2;
        $this->streetNumber = $streetNumber;
        $this->city = $city;
        $this->state = $state;
        $this->zipcode = $zipcode;
        $this->country = $country;
        $this->email = $email;
        $this->phoneNo = $phoneNo;
        $this->taxId = $taxId;
        $this->countryName = $countryName;
    }

    public static function fromArray(array $data): static
    {
        return new self(
            title: TypeConverter::toString($data['title'] ?? null),
            salutation: TypeConverter::toString($data['salutation'] ?? null),
            company: TypeConverter::toString($data['company'] ?? null),
            firstName: TypeConverter::toString($data['first_name'] ?? null),
            lastName: TypeConverter::toString($data['last_name'] ?? null),
            street: TypeConverter::toString($data['street'] ?? null),
            street2: TypeConverter::toString($data['street2'] ?? null),
            streetNumber: TypeConverter::toString($data['street_number'] ?? null),
            city: TypeConverter::toString($data['city'] ?? null),
            state: TypeConverter::toString($data['state'] ?? null),
            zipcode: TypeConverter::toString($data['zipcode'] ?? null),
            country: TypeConverter::toString($data['country'] ?? null),
            email: TypeConverter::toString($data['email'] ?? null),
            phoneNo: TypeConverter::toString($data['phone_no'] ?? null),
            taxId: TypeConverter::toString($data['tax_id'] ?? null),
            countryName: TypeConverter::toString($data['country_name'] ?? null),
        );
    }
}
