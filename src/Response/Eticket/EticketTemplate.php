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

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            templateId: $data['template_id'] ?? '',
            templateName: $data['template_name'] ?? '',
            description: $data['description'] ?? null,
            previewUrl: $data['preview_url'] ?? null,
        );
    }
}
