<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Get E-Ticket Settings Response
 *
 * Response containing e-ticket configuration settings.
 */
final class GetEticketSettingsResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $settings
     */
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
        $defaultLocationId = $data['default_location_id'] ?? null;
        $defaultTemplateId = $data['default_template_id'] ?? null;
        $maxTicketsPerOrder = $data['max_tickets_per_order'] ?? 10;
        $settings = $data['settings'] ?? [];
        if (! is_array($settings)) {
            $settings = [];
        }
        /** @var array<string, mixed> $validatedSettings */
        $validatedSettings = $settings;

        $instance = new self(
            eticketEnabled: TypeConverter::toBool($data['eticket_enabled'] ?? false) ?? false,
            defaultLocationId: $defaultLocationId !== null ? TypeConverter::toString($defaultLocationId) : null,
            defaultTemplateId: $defaultTemplateId !== null ? TypeConverter::toString($defaultTemplateId) : null,
            maxTicketsPerOrder: TypeConverter::toInt($maxTicketsPerOrder) ?? 10,
            requireEmailValidation: TypeConverter::toBool($data['require_email_validation'] ?? false) ?? false,
            settings: $validatedSettings,
        );

        return $instance;
    }
}
