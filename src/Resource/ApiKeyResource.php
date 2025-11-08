<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\ApiKey\RequestApiKeyRequest;
use GoSuccess\Digistore24\Api\Request\ApiKey\RetrieveApiKeyRequest;
use GoSuccess\Digistore24\Api\Request\ApiKey\UnregisterRequest;
use GoSuccess\Digistore24\Api\Response\ApiKey\RequestApiKeyResponse;
use GoSuccess\Digistore24\Api\Response\ApiKey\RetrieveApiKeyResponse;
use GoSuccess\Digistore24\Api\Response\ApiKey\UnregisterResponse;

/**
 * API Key Management Resource
 *
 * Provides methods to manage API keys for authentication.
 */
final class ApiKeyResource extends AbstractResource
{
    /**
     * Request a new API key.
     *
     * @param RequestApiKeyRequest $request Request containing vendor credentials
     * @return RequestApiKeyResponse Response with new API key
     */
    public function request(RequestApiKeyRequest $request): RequestApiKeyResponse
    {
        return $this->executeTyped($request, RequestApiKeyResponse::class);
    }

    /**
     * Retrieve an existing API key.
     *
     * @param RetrieveApiKeyRequest $request Request containing vendor credentials
     * @return RetrieveApiKeyResponse Response with existing API key
     */
    public function retrieve(RetrieveApiKeyRequest $request): RetrieveApiKeyResponse
    {
        return $this->executeTyped($request, RetrieveApiKeyResponse::class);
    }

    /**
     * Unregister and revoke API access.
     *
     * @param UnregisterRequest|null $request Optional request to unregister API access
     * @return UnregisterResponse Response confirming unregistration
     */
    public function unregister(?UnregisterRequest $request = null): UnregisterResponse
    {
        return $this->executeTyped($request ?? new UnregisterRequest(), UnregisterResponse::class);
    }
}
