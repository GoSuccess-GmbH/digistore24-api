<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\System\GetGlobalSettingsRequest;
use GoSuccess\Digistore24\Api\Request\System\PingRequest;
use GoSuccess\Digistore24\Api\Response\System\GetGlobalSettingsResponse;
use GoSuccess\Digistore24\Api\Response\System\PingResponse;

/**
 * System Resource
 *
 * System utilities and configuration.
 */
final class SystemResource extends AbstractResource
{
    /**
     * Ping the Digistore24 server
     *
     * Tests the connection to the Digistore24 server and determines the server time.
     * Useful for connectivity checks and time synchronization.
     *
     * @link https://digistore24.com/api/docs/paths/ping.yaml OpenAPI Specification
     *
     * @param PingRequest $request The ping request
     * @throws ApiException
     * @return PingResponse The response with server time
     */
    public function ping(PingRequest $request): PingResponse
    {
        return $this->executeTyped($request, PingResponse::class);
    }

    /**
     * Get global Digistore24 settings
     *
     * Returns global system settings like allowed image sizes and system types.
     * Useful for determining constraints and available options.
     *
     * @link https://digistore24.com/api/docs/paths/getGlobalSettings.yaml OpenAPI Specification
     *
     * @param GetGlobalSettingsRequest $request The get global settings request
     * @throws ApiException
     * @return GetGlobalSettingsResponse The response with global settings
     */
    public function getGlobalSettings(GetGlobalSettingsRequest $request): GetGlobalSettingsResponse
    {
        return $this->executeTyped($request, GetGlobalSettingsResponse::class);
    }
}
