<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Request\License;

use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;

/**
 * Request to validate a license key.
 *
 * Validates a license key against a purchase and returns detailed
 * information about the license status.
 *
 * @see https://digistore24.com/api/docs/paths/validateLicenseKey.yaml
 */
final readonly class ValidateLicenseKeyRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The purchase ID to validate against
     * @param string $licenseKey The license key to validate
     */
    public function __construct(
        private string $purchaseId,
        private string $licenseKey,
    ) {}

    public function getEndpoint(): string
    {
        return 'validateLicenseKey';
    }

    public function getMethod(): Method
    {
        return Method::GET;
    }

    public function getParameters(): array
    {
        return [
            'purchase_id' => $this->purchaseId,
            'license_key' => $this->licenseKey,
        ];
    }
}
