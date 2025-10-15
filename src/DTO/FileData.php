<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * File Data Transfer Object
 *
 * Data structure for file attachments used in service proof requests.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/updateServiceProofRequest.yaml
 */
final class FileData
{
    /**
     * Download URL for file contents
     */
    public string $url {
        set {
            if (! filter_var($value, FILTER_VALIDATE_URL)) {
                throw new \InvalidArgumentException('URL must be a valid URL');
            }
            $this->url = $value;
        }
    }

    /**
     * Optional filename for the file
     */
    public ?string $filename = null;

    /**
     * Create FileData from array
     *
     * @param array{
     *     url: string,
     *     filename?: string|null
     * } $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->url = $data['url'];
        $instance->filename = $data['filename'] ?? null;

        return $instance;
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $data = ['url' => $this->url];

        if ($this->filename !== null) {
            $data['filename'] = $this->filename;
        }

        return $data;
    }
}
