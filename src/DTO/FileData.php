<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * File Data Transfer Object
 *
 * Data structure for file attachments used in service proof requests.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/updateServiceProofRequest.yaml
 */
final class FileData extends AbstractDataTransferObject
{
    /**
     * Download URL for file contents
     */
    public string $url {
        set {
            if (! Validator::isUrl($value)) {
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
