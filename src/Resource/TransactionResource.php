<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Transaction\ListTransactionsRequest;
use GoSuccess\Digistore24\Api\Request\Transaction\RefundTransactionRequest;
use GoSuccess\Digistore24\Api\Response\Transaction\ListTransactionsResponse;
use GoSuccess\Digistore24\Api\Response\Transaction\RefundTransactionResponse;

/**
 * Transaction Resource
 *
 * Provides methods to manage financial transactions and refunds.
 */
final class TransactionResource extends AbstractResource
{
    /**
     * List all transactions with optional filters.
     *
     * @param ListTransactionsRequest $request Request with optional filter criteria
     * @return ListTransactionsResponse Response with list of transactions
     */
    public function list(ListTransactionsRequest $request): ListTransactionsResponse
    {
        return $this->executeTyped($request, ListTransactionsResponse::class);
    }

    /**
     * Refund a specific transaction.
     *
     * @param RefundTransactionRequest $request Request containing transaction ID
     * @return RefundTransactionResponse Response with refund details
     */
    public function refund(RefundTransactionRequest $request): RefundTransactionResponse
    {
        return $this->executeTyped($request, RefundTransactionResponse::class);
    }
}
