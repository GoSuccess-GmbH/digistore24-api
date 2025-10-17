<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Buyer Data Transfer Object
 *
 * Represents buyer information for API requests and responses.
 * Uses PHP 8.4 property hooks for automatic validation.
 */
final class BuyerData
{
    public string $email {
        set {
            if (! Validator::isEmail($value)) {
                throw new \InvalidArgumentException("Invalid email address: {$value}");
            }
            $this->email = $value;
        }
    }

    public ?string $salutation = null;

    public ?string $title = null;

    public ?string $firstName = null;

    public ?string $lastName = null;

    public ?string $company = null;

    public ?string $street = null;

    public ?string $city = null;

    public ?string $zipcode = null;

    public ?string $state = null;

    public ?string $country = null {
        set {
            if ($value !== null) {
                $upperValue = strtoupper($value);
                if (! Validator::isCountryCode($upperValue)) {
                    throw new \InvalidArgumentException("Country must be 2-letter code: {$value}");
                }
                $this->country = $upperValue;
            } else {
                $this->country = null;
            }
        }
    }

    public ?string $phoneNo = null;

    public ?string $taxId = null;

    public ?string $readonlyKeys = null;

    public ?string $id = null;
}
