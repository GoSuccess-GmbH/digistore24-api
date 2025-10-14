<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Get Affiliate Commission Response
 *
 * Response object for the Affiliate API endpoint.
 */
final readonly class GetAffiliateCommissionResponse extends AbstractResponse
{
    public function __construct(private array $commission)
    {
    }

    public function getCommission(): array
    {
        return $this->commission;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(commission: $data['data']['commission'] ?? []);
    }
}