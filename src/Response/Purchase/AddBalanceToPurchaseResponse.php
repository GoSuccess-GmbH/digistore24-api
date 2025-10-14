<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Response from adding balance to a purchase
 *
 * @link https://digistore24.com/api/docs/paths/addBalanceToPurchase.yaml OpenAPI Specification
 */
final readonly class AddBalanceToPurchaseResponse extends AbstractResponse
{
    public float $oldBalance;
    public float $newBalance;

    protected function parse(array $data): void
    {
        $this->oldBalance = (float)$data['old_balance'];
        $this->newBalance = (float)$data['new_balance'];
    }

    /**
     * Get the balance difference
     */
    public function getBalanceChange(): float
    {
        return $this->newBalance - $this->oldBalance;
    }
}
