<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Placeholder Data
 *
 * Represents placeholders for product title and description.
 */
final class PlaceholderData
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
     * Convert to array for API request
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return $this->values;
    }
}
