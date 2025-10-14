<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\License\ValidateLicenseKeyRequest;
use GoSuccess\Digistore24\Api\Response\License\ValidateLicenseKeyResponse;

/**
 * License Resource
 * 
 * Validate and manage license keys.
 */
final class LicenseResource extends AbstractResource
{
    /**
     * Validate a license key
     * 
     * Validates a license key against a purchase and returns detailed
     * information about the license status.
     * 
     * @link https://digistore24.com/api/docs/paths/validateLicenseKey.yaml OpenAPI Specification
     * 
     * @param ValidateLicenseKeyRequest $request The validate license key request
     * @return ValidateLicenseKeyResponse The response with license validation result
     * @throws \GoSuccess\Digistore24\Exception\ApiException
     */
    public function validate(ValidateLicenseKeyRequest $request): ValidateLicenseKeyResponse
    {
        return $this->executeTyped($request, ValidateLicenseKeyResponse::class);
    }
}
