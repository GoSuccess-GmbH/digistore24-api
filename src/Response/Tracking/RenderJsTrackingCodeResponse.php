<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Tracking;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Response containing JavaScript tracking code.
 *
 * @see https://digistore24.com/api/docs/paths/renderJsTrackingCode.yaml
 */
final readonly class RenderJsTrackingCodeResponse extends AbstractResponse
{
    public function __construct(
        private string $result,
        private string $scriptCode,
        private string $scriptUrl,
    ) {}

    /**
     * Get result status.
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * Get the complete JavaScript tag to be embedded.
     */
    public function getScriptCode(): string
    {
        return $this->scriptCode;
    }

    /**
     * Get the script URL.
     */
    public function getScriptUrl(): string
    {
        return $this->scriptUrl;
    }

    /**
     * Check if request was successful.
     */
    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success'
            || strtolower($this->result) === 'ok';
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        $trackingData = $data['data'] ?? [];

        return new self(
            result: (string) ($data['result'] ?? 'unknown'),
            scriptCode: (string) ($trackingData['script_code'] ?? ''),
            scriptUrl: (string) ($trackingData['script_url'] ?? ''),
        );
    }
}
