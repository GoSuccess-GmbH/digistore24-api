<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\DataObjects;

/**
 * Buyer Data
 * 
 * Immutable data object for buyer information.
 * Uses PHP 8.4 readonly properties and property hooks.
 */
readonly class BuyerData
{
    public string $email;
    public ?string $salutation;
    public ?string $title;
    public ?string $firstName;
    public ?string $lastName;
    public ?string $company;
    public ?string $street;
    public ?string $city;
    public ?string $zipcode;
    public ?string $state;
    public ?string $country;
    public ?string $phoneNo;
    public ?string $taxId;
    public ?string $readonlyKeys;
    public ?string $id;

    public function __construct(
        string $email,
        ?string $salutation = null,
        ?string $title = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $company = null,
        ?string $street = null,
        ?string $city = null,
        ?string $zipcode = null,
        ?string $state = null,
        ?string $country = null,
        ?string $phoneNo = null,
        ?string $taxId = null,
        ?string $readonlyKeys = null,
        ?string $id = null,
    ) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email address: {$email}");
        }
        
        if ($country !== null && strlen($country) !== 2) {
            throw new \InvalidArgumentException("Country must be 2-letter code: {$country}");
        }

        $this->email = $email;
        $this->salutation = $salutation;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->company = $company;
        $this->street = $street;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->state = $state;
        $this->country = $country !== null ? strtoupper($country) : null;
        $this->phoneNo = $phoneNo;
        $this->taxId = $taxId;
        $this->readonlyKeys = $readonlyKeys;
        $this->id = $id;
    }
}
