<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Resource;

use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\System\PingRequest;
use GoSuccess\Digistore24\Request\System\GetGlobalSettingsRequest;
use GoSuccess\Digistore24\Response\System\PingResponse;
use GoSuccess\Digistore24\Response\System\GetGlobalSettingsResponse;

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
     * @return PingResponse The response with server time
     * @throws \GoSuccess\Digistore24\Exception\ApiException
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
     * @return GetGlobalSettingsResponse The response with global settings
     * @throws \GoSuccess\Digistore24\Exception\ApiException
     */
    public function getGlobalSettings(GetGlobalSettingsRequest $request): GetGlobalSettingsResponse
    {
        return $this->executeTyped($request, GetGlobalSettingsResponse::class);
    }
}
