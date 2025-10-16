<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Validate Affiliate Response
 *
 * Response object for the Affiliate API endpoint.
 */
final class ValidateAffiliateResponse extends AbstractResponse
{
    public function __construct(private bool $isValid, private array $data)
    {
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        
return new self(
            isValid: (bool)($innerData['is_valid'] ?? false),
            data: $data['data'] ?? [],
        );
    }
}
