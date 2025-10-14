<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\System;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Request to get global Digistore24 settings.
 *
 * Returns global system settings like allowed image sizes and system types.
 * Useful for determining constraints and available options.
 *
 * @see https://digistore24.com/api/docs/paths/getGlobalSettings.yaml
 */
final class GetGlobalSettingsRequest extends AbstractRequest
{
    public function __construct()
    {
        // No parameters required
    }

    public function getEndpoint(): string
    {
        return 'getGlobalSettings';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return [];
    }
}
