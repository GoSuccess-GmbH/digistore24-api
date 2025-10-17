<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Contract\DataTransferObjectInterface;

/**
 * Placeholder Data
 *
 * Represents flexible key-value placeholders for product title and description.
 * Placeholders are vendor-specific and completely dynamic - no fixed properties.
 *
 * Usage:
 * ```php
 * $placeholders = new PlaceholderData();
 * $placeholders->set('servicename', 'Software Development');
 * $placeholders->set('description', 'Research, Development, Debugging');
 * ```
 *
 * Or use array access (for backwards compatibility):
 * ```php
 * $data->placeholders = ['servicename' => 'Software Development'];
 * ```
 */
final class PlaceholderData implements DataTransferObjectInterface
{
    /**
     * @param array<string, string> $values Key-value pairs of placeholders
     */
    public function __construct(
        public array $values = [],
    ) {
    }

    /**
     * Set a placeholder value
     */
    public function set(string $key, string $value): self
    {
        $this->values[$key] = $value;

        return $this;
    }

    /**
     * Get a placeholder value
     */
    public function get(string $key): ?string
    {
        return $this->values[$key] ?? null;
    }

    /**
     * Create from array
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): static
    {
        // PlaceholderData is just a key-value store, convert all values to strings
        $stringData = [];
        foreach ($data as $key => $value) {
            if (is_scalar($value) || is_null($value)) {
                $stringData[$key] = (string)$value;
            }
        }

        return new self($stringData);
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return $this->values;
    }
}
