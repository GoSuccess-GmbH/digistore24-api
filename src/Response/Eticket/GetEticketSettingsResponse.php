<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get E-Ticket Settings Response
 *
 * Response containing e-ticket configuration settings.
 */
final class GetEticketSettingsResponse extends AbstractResponse
{
    public function __construct(
        public readonly bool $eticketEnabled,
        public readonly ?string $defaultLocationId,
        public readonly ?string $defaultTemplateId,
        public readonly int $maxTicketsPerOrder,
        public readonly bool $requireEmailValidation,
        public readonly array $settings,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $instance = new self(
            eticketEnabled: (bool) ($data['eticket_enabled'] ?? false),
            defaultLocationId: $data['default_location_id'] ?? null,
            defaultTemplateId: $data['default_template_id'] ?? null,
            maxTicketsPerOrder: (int) ($data['max_tickets_per_order'] ?? 10),
            requireEmailValidation: (bool) ($data['require_email_validation'] ?? false),
            settings: $data['settings'] ?? [],
        );
        return $instance;
    }
}
