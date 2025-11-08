<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Http\Response;

/**
 * E-Ticket Template
 *
 * Represents an e-ticket template.
 */
final class EticketTemplate
{
    public function __construct(
        public readonly string $templateId,
        public readonly string $templateName,
        public readonly ?string $description,
        public readonly ?string $previewUrl,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $templateId = $data['template_id'] ?? '';
        $templateName = $data['template_name'] ?? '';
        $description = $data['description'] ?? null;
        $previewUrl = $data['preview_url'] ?? null;

        return new self(
            templateId: is_string($templateId) ? $templateId : '',
            templateName: is_string($templateName) ? $templateName : '',
            description: $description !== null && is_string($description) ? $description : null,
            previewUrl: $previewUrl !== null && is_string($previewUrl) ? $previewUrl : null,
        );
    }
}
