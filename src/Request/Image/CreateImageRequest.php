<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Image;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Create Image Request
 * 
 * Creates an image on Digistore24 by providing a URL to copy from.
 */
final class CreateImageRequest extends AbstractRequest
{
    /**
     * @param string $name Name of the image (max 63 characters)
     * @param string $imageUrl URL from which Digistore24 copies the image
     * @param string|null $usageType Purpose of the image (e.g., 'product')
     * @param string|null $altTag Alternative text for the image
     */
    public function __construct(
        public string $name,
        public string $imageUrl,
        public ?string $usageType = null,
        public ?string $altTag = null,
    ) {
        if (strlen($name) > 63) {
            throw new \InvalidArgumentException('Image name must not exceed 63 characters');
        }
    }

    public function endpoint(): string
    {
        return 'createImage';
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'image-url' => $this->imageUrl,
        ];

        if ($this->usageType !== null) {
            $data['usage_type'] = $this->usageType;
        }

        if ($this->altTag !== null) {
            $data['alt_tag'] = $this->altTag;
        }

        return ['data' => $data];
    }

    protected function rules(): array
    {
        return [
            'data' => 'required',
        ];
    }
}
