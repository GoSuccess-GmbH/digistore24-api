<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

use GoSuccess\Digistore24\Api\Enum\HttpMethod;
use GoSuccess\Digistore24\Api\Exception\ApiException;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * HTTP Client Interface
 *
 * Defines the contract for HTTP clients that communicate with the API.
 * This abstraction allows for different HTTP implementations and easier testing.
 */
interface HttpClientInterface
{
    /**
     * Send a request to the API
     *
     * @param string $endpoint API endpoint (e.g., 'createBuyUrl')
     * @param HttpMethod $method HTTP method
     * @param array<string, mixed> $params Request parameters
     * @throws ApiException When the request fails or returns an error
     * @return Response The API response
     */
    public function request(
        string $endpoint,
        HttpMethod $method = HttpHttpMethod::POST,
        array $params = [],
    ): Response;
}
