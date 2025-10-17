<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Affiliate Commission Response
 *
 * Response object for the Affiliate API endpoint.
 */
final class GetAffiliateCommissionResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $commission
     */
    public function __construct(private array $commission)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getCommission(): array
    {
        return $this->commission;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $commission = $innerData['commission'] ?? [];

        if (! is_array($commission)) {
            $commission = [];
        }

        /** @var array<string, mixed> $validatedCommission */
        $validatedCommission = $commission;

        return new self(commission: $validatedCommission);
    }
}
