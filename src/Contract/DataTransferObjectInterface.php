<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

/**
 * Data Transfer Object Interface
 *
 * All DTOs must implement this interface to ensure they can be
 * serialized to and deserialized from arrays.
 */
interface DataTransferObjectInterface
{
    /**
     * Create instance from array
     *
     * @param array<string, mixed> $data
     * @return static
     */
    public static function fromArray(array $data): static;

    /**
     * Convert instance to array
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
