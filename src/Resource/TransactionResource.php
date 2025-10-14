<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Transaction\ListTransactionsRequest;
use GoSuccess\Digistore24\Api\Request\Transaction\RefundTransactionRequest;
use GoSuccess\Digistore24\Api\Response\Transaction\ListTransactionsResponse;
use GoSuccess\Digistore24\Api\Response\Transaction\RefundTransactionResponse;
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
