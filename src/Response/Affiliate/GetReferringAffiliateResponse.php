<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Referring Affiliate Response
 *
 * Response object for the Affiliate API endpoint.
 */
final class GetReferringAffiliateResponse extends AbstractResponse
{
    public function __construct(private ?string $affiliateId)
    {
    }

    public function getAffiliateId(): ?string
    {
        return $this->affiliateId;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $affiliateId = $innerData['affiliate_id'] ?? null;
        
        return new self(affiliateId: is_string($affiliateId) ? $affiliateId : null);
    }
}
