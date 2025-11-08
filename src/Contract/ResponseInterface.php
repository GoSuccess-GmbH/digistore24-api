<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response Interface
 *
 * Defines the contract for all API response objects.
 * Every response must be able to be created from HTTP responses or arrays,
 * and convert itself back to an array.
 */
interface ResponseInterface extends ArrayableInterface
{
    /**
     * Create response from HTTP response
     *
     * @param Response $response Raw HTTP response
     * @return static New instance of the response class
     */
    public static function fromResponse(Response $response): static;

    /**
     * Create response from array data
     *
     * @param array<string, mixed> $data Response data
     * @param Response|null $rawResponse Optional raw HTTP response
     * @return static New instance of the response class
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static;
}
