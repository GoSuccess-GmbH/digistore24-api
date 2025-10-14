<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Transaction\ListTransactionsRequest;
use GoSuccess\Digistore24\Request\Transaction\RefundTransactionRequest;
use GoSuccess\Digistore24\Response\Transaction\ListTransactionsResponse;
use GoSuccess\Digistore24\Response\Transaction\RefundTransactionResponse;
final class TransactionResource extends AbstractResource
{
    public function list(ListTransactionsRequest $request): ListTransactionsResponse
    {
        return $this->executeTyped($request, ListTransactionsResponse::class);
    }
    public function refund(RefundTransactionRequest $request): RefundTransactionResponse
    {
        return $this->executeTyped($request, RefundTransactionResponse::class);
    }
}
