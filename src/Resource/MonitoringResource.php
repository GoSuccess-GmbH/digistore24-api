<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\System\PingRequest;
use GoSuccess\Digistore24\Api\Response\System\PingResponse;

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
     * @link https://digistore24.com/api/docs/paths/ping.yaml
     *
     * @param PingRequest|null $request Optional ping request (accepts no parameters)
     * @return PingResponse Response with API status information
     *
     * @example
     * ```php
     * $response = $client->monitoring->ping();
     * echo $response->message; // "pong"
     * echo "API latency: {$response->timestamp}\n";
     * ```
     */
    public function ping(?PingRequest $request = null): PingResponse
    {
        $request ??= new PingRequest();

        return $this->executeTyped($request, PingResponse::class);
    }
}
