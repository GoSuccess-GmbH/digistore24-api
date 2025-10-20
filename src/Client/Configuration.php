<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Client;

/**
 * API Configuration
 *
 * Holds all configuration settings for the Digistore24 API client.
 * Uses PHP 8.4 property hooks for validation and computed properties.
 */
final class Configuration
{
    /**
     * The Digistore24 API key (format: XXX-XXXXXXXXXXXXXXXXX)
     */
    public string $apiKey {
        set {
            if (empty($value)) {
                throw new \InvalidArgumentException('API key cannot be empty');
            }
            $this->apiKey = $value;
        }
    }

    /**
     * Base URL for the API (automatically trimmed)
     */
    public string $baseUrl = 'https://www.digistore24.com' {
        set => rtrim($value, '/');
    }

    /**
     * Request timeout in seconds (minimum 1)
     */
    public int $timeout = 30 {
        set {
            if ($value < 1) {
                throw new \InvalidArgumentException('Timeout must be at least 1 second');
            }
            $this->timeout = $value;
        }
    }

    /**
     * Maximum number of retry attempts (minimum 0)
     */
    public int $maxRetries = 3 {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('Max retries cannot be negative');
            }
            $this->maxRetries = $value;
        }
    }

    /**
     * Enable debug mode with detailed logging
     */
    public bool $debug = false;

    /**
     * Full API endpoint URL (computed property)
     */
    public string $apiUrl {
        get => $this->baseUrl . '/api/call';
    }

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
