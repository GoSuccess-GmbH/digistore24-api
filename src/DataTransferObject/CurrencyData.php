<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DataTransferObject;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;

/**
 * Currency Data Transfer Object
 *
 * Represents a currency with pricing limits.
 */
final class CurrencyData extends AbstractDataTransferObject
{
    /**
     * Currency ID
     */
    public ?int $id {
        get => $this->id ?? null;
    }

    /**
     * Currency code (e.g., EUR, USD)
     */
    public string $code {
        get => $this->code ?? '';
    }

    /**
     * Currency symbol (e.g., €, $)
     */
    public string $symbol {
        get => $this->symbol ?? '';
    }

    /**
     * Minimum price allowed
     */
    public ?float $minPrice {
        get => $this->minPrice ?? null;
    }

    /**
     * Maximum price allowed
     */
    public ?float $maxPrice {
        get => $this->maxPrice ?? null;
    }

    /**
     * Currency name
     */
    public string $name {
        get => $this->name ?? '';
    }
}
