<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Image;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List Images Request
 *
 * Lists all images in the account.
 */
final class ListImagesRequest extends AbstractRequest
{
    public function __construct(
        public readonly ?string $usageType = null,
    ) {
    }

    public function endpoint(): string
    {
        return '/listImages';
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->usageType !== null) {
            $data['usage_type'] = $this->usageType;
        }

        return $data;
    }

    
}
