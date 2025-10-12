<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Resource;

use GoSuccess\Digistore24\Base\AbstractResource;

/**
 * Monitoring Resource
 * 
 * Health checks and API status monitoring.
 * 
 * @link https://digistore24.com/api/docs/tags/monitoring
 */
final class MonitoringResource extends AbstractResource
{
    /**
     * Ping the API to check connectivity
     * 
     * TODO: Implement when ping endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/ping.yaml
     * 
     * @example
     * ```php
     * $request = new PingRequest();
     * $response = $client->monitoring->ping($request);
     * echo $response->isSuccess ? "API is up!" : "API is down!";
     * ```
     */
    // public function ping(PingRequest $request): PingResponse
    // {
    //     return $this->executeTyped($request, PingResponse::class);
    // }
}
