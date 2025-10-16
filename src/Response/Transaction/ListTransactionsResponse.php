<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Transaction;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Transactions Response
 *
 * Response object for the Transaction API endpoint.
 */
final class ListTransactionsResponse extends AbstractResponse
{
    /** @param array<string, mixed> $data */
    public function __construct(private array $data)
    {
    }

    /** @return array<string, mixed> */
    public function getData(): array
    {
        return $this->data;
    }

    /** @return array<string, mixed> */
    public function getTransactionList(): array
    {
        $transactionList = $this->data['transaction_list'] ?? [];
        if (!is_array($transactionList)) {
            return [];
        }
        /** @var array<string, mixed> $validated */
        $validated = $transactionList;

        return $validated;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];
        if (!is_array($responseData)) {
            $responseData = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        return new self(data: $validatedData);
    }
}
