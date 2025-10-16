<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\System;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response from pinging the Digistore24 server.
 *
 * @see https://digistore24.com/api/docs/paths/ping.yaml
 */
final class PingResponse extends AbstractResponse
{
    public function __construct(
        private string $result,
        private string $serverTime,
    ) {
    }

    /**
     * Get result status.
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * Get server time.
     */
    public function getServerTime(): string
    {
        return $this->serverTime;
    }

    /**
     * Check if ping was successful.
     */
    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success'
            || strtolower($this->result) === 'ok';
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $serverTime = $innerData['server_time'] ?? '';

        return new self(
            result: self::extractResult($data, $rawResponse),
            serverTime: is_string($serverTime) ? $serverTime : '',
        );
    }
}
