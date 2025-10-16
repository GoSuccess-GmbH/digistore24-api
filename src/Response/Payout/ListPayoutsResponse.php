<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Payout;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Payouts Response
 *
 * Response object for the Payout API endpoint.
 */
final class ListPayoutsResponse extends AbstractResponse
{
    public function __construct(private array $payoutList)
    {
    }

    public function getPayoutList(): array
    {
        return $this->payoutList;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        
return new self(payoutList: $innerData['payout_list'] ?? []);
    }
}
