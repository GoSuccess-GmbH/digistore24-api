<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\System;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Response from pinging the Digistore24 server.
 *
 * Contains server time, API version, and runtime information.
 */
final class PingResponse extends AbstractResponse
{
    /**
     * API version
     */
    public string $apiVersion = '' {
        get => $this->apiVersion;
    }

    /**
     * Current server time
     */
    public ?DateTimeImmutable $currentTime = null {
        get => $this->currentTime;
    }

    /**
     * Runtime in seconds
     */
    public float $runtimeSeconds = 0.0 {
        get => $this->runtimeSeconds;
    }

    /**
     * Result status
     */
    public string $result = '' {
        get => $this->result;
    }

    /**
     * Server time from data field
     */
    public ?DateTimeImmutable $serverTime = null {
        get => $this->serverTime;
    }

    public function __construct(
        string $apiVersion = '',
        ?DateTimeImmutable $currentTime = null,
        float $runtimeSeconds = 0.0,
        string $result = '',
        ?DateTimeImmutable $serverTime = null,
    ) {
        $this->apiVersion = $apiVersion;
        $this->currentTime = $currentTime;
        $this->runtimeSeconds = $runtimeSeconds;
        $this->result = $result;
        $this->serverTime = $serverTime;
    }

    /**
     * Check if ping was successful
     */
    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success'
            || strtolower($this->result) === 'ok';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        // For ping, we need top-level fields from rawResponse if available
        $topLevel = $rawResponse !== null ? $rawResponse->data : $data;
        $innerData = self::extractInnerData($data);

        $instance = new self(
            apiVersion: TypeConverter::toString($topLevel['api_version'] ?? null) ?? '',
            currentTime: TypeConverter::toDateTime($topLevel['current_time'] ?? null),
            runtimeSeconds: TypeConverter::toFloat($topLevel['runtime_seconds'] ?? null) ?? 0.0,
            result: self::extractResult($data, $rawResponse),
            serverTime: TypeConverter::toDateTime($innerData['server_time'] ?? null),
        );

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
