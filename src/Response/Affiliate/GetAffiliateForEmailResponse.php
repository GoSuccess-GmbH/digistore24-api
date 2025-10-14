<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Get Affiliate For Email Response
 *
 * Response object for the Affiliate API endpoint.
 */
final readonly class GetAffiliateForEmailResponse extends AbstractResponse
{
    public function __construct(private ?string $affiliateId)
    {
    }

    public function getAffiliateId(): ?string
    {
        return $this->affiliateId;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(affiliateId: $data['data']['affiliate_id'] ?? null);
    }
}