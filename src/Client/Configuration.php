<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Client;

/**
 * API Configuration
 * 
 * Holds all configuration settings for the Digistore24 API client.
 */
readonly class Configuration
{
    /**
     * @param string $apiKey The Digistore24 API key (format: XXX-XXXXXXXXXXXXXXXXX)
     * @param string $baseUrl Base URL for the API (default: production)
     * @param int $timeout Request timeout in seconds
     * @param int $maxRetries Maximum number of retry attempts for failed requests
     * @param string $language Response language ('de' or 'en')
     * @param string|null $operatorName Optional operator name for audit logging
     * @param bool $debug Enable debug mode with detailed logging
     */
    public function __construct(
        public string $apiKey,
        public string $baseUrl = 'https://www.digistore24.com',
        public int $timeout = 30,
        public int $maxRetries = 3,
        public string $language = 'en',
        public ?string $operatorName = null,
        public bool $debug = false,
    ) {
        if (empty($this->apiKey)) {
            throw new \InvalidArgumentException('API key cannot be empty');
        }

        if (!in_array($this->language, ['de', 'en'], true)) {
            throw new \InvalidArgumentException('Language must be either "de" or "en"');
        }

        if ($this->timeout < 1) {
            throw new \InvalidArgumentException('Timeout must be at least 1 second');
        }

        if ($this->maxRetries < 0) {
            throw new \InvalidArgumentException('Max retries cannot be negative');
        }
    }

    /**
     * Get API endpoint URL
     */
    public function getApiUrl(): string
    {
        return rtrim($this->baseUrl, '/') . '/api/call';
    }
}
