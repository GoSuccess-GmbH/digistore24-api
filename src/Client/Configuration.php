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
    public string $baseUrl {
        set => rtrim($value, '/');
    }

    /**
     * Request timeout in seconds (minimum 1)
     */
    public int $timeout {
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
    public int $maxRetries {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('Max retries cannot be negative');
            }
            $this->maxRetries = $value;
        }
    }

    /**
     * Response language ('de' or 'en')
     */
    public string $language {
        set {
            if (! in_array($value, ['de', 'en'], true)) {
                throw new \InvalidArgumentException('Language must be either "de" or "en"');
            }
            $this->language = $value;
        }
    }

    /**
     * Optional operator name for audit logging
     */
    public ?string $operatorName;

    /**
     * Enable debug mode with detailed logging
     */
    public bool $debug;

    /**
     * Full API endpoint URL (computed property)
     */
    public string $apiUrl {
        get => $this->baseUrl . '/api/call';
    }

    public function __construct(
        string $apiKey,
        string $baseUrl = 'https://www.digistore24.com',
        int $timeout = 30,
        int $maxRetries = 3,
        string $language = 'en',
        ?string $operatorName = null,
        bool $debug = false,
    ) {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
        $this->timeout = $timeout;
        $this->maxRetries = $maxRetries;
        $this->language = $language;
        $this->operatorName = $operatorName;
        $this->debug = $debug;
    }
}
