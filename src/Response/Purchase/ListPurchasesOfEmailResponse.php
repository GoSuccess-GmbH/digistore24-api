<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Purchases Of Email Response
 *
 * Response object for the Purchase API endpoint.
 */
final class ListPurchasesOfEmailResponse extends AbstractResponse
{
    public string $result { get => $this->result ?? ''; }

    /** @var array<int, array<string, mixed>> */
    public array $purchases { get => $this->purchases ?? []; }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $purchases = $data['data'] ?? [];
        if (! is_array($purchases)) {
            $purchases = [];
        }
        /** @var array<int, array<string, mixed>> $validatedPurchases */
        $validatedPurchases = $purchases;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->purchases = $validatedPurchases;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
