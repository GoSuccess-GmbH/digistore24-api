<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Request Interface
 * 
 * Defines the contract for all API request objects.
 * Every request must be able to provide its endpoint, HTTP method,
 * convert itself to an array, and support validation.
 */
interface RequestInterface extends ArrayableInterface, ValidatableInterface
{
    /**
     * Get the API endpoint for this request
     * 
     * @return string The endpoint path (e.g., 'createBuyUrl')
     */
    public function endpoint(): string;

    /**
     * Get the HTTP method for this request
     * 
     * @return Method The HTTP method to use
     */
    public function method(): Method;
}
