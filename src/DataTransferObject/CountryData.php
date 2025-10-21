<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DataTransferObject;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;

/**
 * Country Data Transfer Object
 *
 * Represents a country with localized names and VAT information.
 */
final class CountryData extends AbstractDataTransferObject
{
    /**
     * Country code (ISO 3166-1 alpha-2)
     */
    public string $code {
        get => $this->code ?? '';
    }

    /**
     * Country name (localized)
     */
    public string $name {
        get => $this->name ?? '';
    }

    /**
     * Country name in German
     */
    public ?string $nameDe {
        get => $this->nameDe ?? null;
    }

    /**
     * Country name in English
     */
    public ?string $nameEn {
        get => $this->nameEn ?? null;
    }

    /**
     * Whether country is EU member
     */
    public bool $euMember {
        get => $this->euMember ?? false;
    }

    /**
     * VAT rate in percent
     */
    public ?float $vatRate {
        get => $this->vatRate ?? null;
    }
}
