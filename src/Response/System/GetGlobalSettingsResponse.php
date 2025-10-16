<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\System;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response containing global Digistore24 settings.
 *
 * @see https://digistore24.com/api/docs/paths/getGlobalSettings.yaml
 */
final class GetGlobalSettingsResponse extends AbstractResponse
{
    /**
     * @param array<string, array{label: string, limits: array{max_file_size_kb: int, min_width: int, max_width: int, min_height: int, max_height: int}, limits_msg: string}> $imageMetas
     * @param array<string, array<string, string>> $types
     */
    public function __construct(
        private array $imageMetas,
        private array $types,
    ) {
    }

    /**
     * Get image metadata for different image types.
     *
     * @return array<string, array{label: string, limits: array{max_file_size_kb: int, min_width: int, max_width: int, min_height: int, max_height: int}, limits_msg: string}>
     */
    public function getImageMetas(): array
    {
        return $this->imageMetas;
    }

    /**
     * Get available values for various system fields.
     *
     * @return array<string, array<string, string>>
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * Get image metadata for a specific image type.
     *
     * @param string $imageType
     * @return array{label: string, limits: array{max_file_size_kb: int, min_width: int, max_width: int, min_height: int, max_height: int}, limits_msg: string}|null
     */
    public function getImageMetaForType(string $imageType): ?array
    {
        return $this->imageMetas[$imageType] ?? null;
    }

    /**
     * Get available values for a specific system field type.
     *
     * @param string $fieldType
     * @return array<string, string>|null
     */
    public function getTypesForField(string $fieldType): ?array
    {
        return $this->types[$fieldType] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $imageMetas = [];
        $imageMetasData = $data['image_metas'] ?? [];
        if (is_array($imageMetasData)) {
            foreach ($imageMetasData as $key => $meta) {
                if (!is_array($meta) || !is_string($key)) {
                    continue;
                }

                $label = $meta['label'] ?? '';
                $limits = $meta['limits'] ?? [];
                $limitsMsg = $meta['limits_msg'] ?? '';

                if (!is_array($limits)) {
                    $limits = [];
                }

                $maxFileSizeKb = $limits['max_file_size_kb'] ?? 0;
                $minWidth = $limits['min_width'] ?? 0;
                $maxWidth = $limits['max_width'] ?? 0;
                $minHeight = $limits['min_height'] ?? 0;
                $maxHeight = $limits['max_height'] ?? 0;

                $imageMetas[$key] = [
                    'label' => is_string($label) ? $label : '',
                    'limits' => [
                        'max_file_size_kb' => is_int($maxFileSizeKb) ? $maxFileSizeKb : 0,
                        'min_width' => is_int($minWidth) ? $minWidth : 0,
                        'max_width' => is_int($maxWidth) ? $maxWidth : 0,
                        'min_height' => is_int($minHeight) ? $minHeight : 0,
                        'max_height' => is_int($maxHeight) ? $maxHeight : 0,
                    ],
                    'limits_msg' => is_string($limitsMsg) ? $limitsMsg : '',
                ];
            }
        }

        $types = $data['types'] ?? [];
        if (!is_array($types)) {
            $types = [];
        }
        /** @var array<string, array<string, string>> $validatedTypes */
        $validatedTypes = $types;

        return new self(
            imageMetas: $imageMetas,
            types: $validatedTypes,
        );
    }
}
