<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;

/**
 * User Resource
 * 
 * Manage API user information and authentication.
 * 
 * @link https://digistore24.com/api/docs/tags/user
 */
final class UserResource extends AbstractResource
{
    /**
     * Get current user information
     * 
     * TODO: Implement when getUserInfo endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/getUserInfo.yaml
     * 
     * @example
     * ```php
     * $request = new GetUserInfoRequest();
     * $user = $client->users->getInfo($request);
     * echo "User: {$user->name}\n";
     * echo "Email: {$user->email}\n";
     * ```
     */
    // public function getInfo(GetUserInfoRequest $request): GetUserInfoResponse
    // {
    //     return $this->executeTyped($request, GetUserInfoResponse::class);
    // }

    /**
     * Request new API key
     * 
     * TODO: Implement when requestApiKey endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/requestApiKey.yaml
     */
    // public function requestApiKey(RequestApiKeyRequest $request): RequestApiKeyResponse
    // {
    //     return $this->executeTyped($request, RequestApiKeyResponse::class);
    // }

    /**
     * Retrieve existing API key
     * 
     * TODO: Implement when retrieveApiKey endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/retrieveApiKey.yaml
     */
    // public function retrieveApiKey(RetrieveApiKeyRequest $request): RetrieveApiKeyResponse
    // {
    //     return $this->executeTyped($request, RetrieveApiKeyResponse::class);
    // }

    /**
     * Unregister/delete API key
     * 
     * TODO: Implement when unregister endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/unregister.yaml
     */
    // public function unregister(UnregisterRequest $request): UnregisterResponse
    // {
    //     return $this->executeTyped($request, UnregisterResponse::class);
    // }
}
