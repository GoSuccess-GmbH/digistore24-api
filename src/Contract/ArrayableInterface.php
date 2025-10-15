<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

/**
 * Arrayable Interface
 *
 * Defines a contract for objects that can be converted to arrays.
 * Used for serialization and API communication.
 */
interface ArrayableInterface
{
    /**
     * Convert the object to an array
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
