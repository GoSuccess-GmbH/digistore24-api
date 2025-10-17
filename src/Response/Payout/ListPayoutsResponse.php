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
    /**
     * @param array<string, mixed> $payoutList
     */
    public function __construct(private array $payoutList)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getPayoutList(): array
    {
        return $this->payoutList;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $payoutList = $innerData['payout_list'] ?? [];

        if (! is_array($payoutList)) {
            $payoutList = [];
        }

        /** @var array<string, mixed> $validatedPayoutList */
        $validatedPayoutList = $payoutList;

        return new self(payoutList: $validatedPayoutList);
    }
}
