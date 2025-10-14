<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Add Balance To Purchase Response
 *
 * Response object for the Purchase API endpoint.
 */
final readonly class AddBalanceToPurchaseResponse extends AbstractResponse
{
    public function __construct(private float $oldBalance, private float $newBalance)
    {
    }

    public function getOldBalance(): float
    {
        return $this->oldBalance;
    }

    public function getNewBalance(): float
    {
        return $this->newBalance;
    }

    public function getBalanceChange(): float
    {
        return $this->newBalance - $this->oldBalance;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            oldBalance: (float) ($data['data']['old_balance'] ?? 0.0),
            newBalance: (float) ($data['data']['new_balance'] ?? 0.0)
        );
    }
}
