<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Create Upgrade Purchase Response
 *
 * Response object for the Purchase API endpoint.
 */
final class CreateUpgradePurchaseResponse extends AbstractResponse
{
    public string $result { get => $this->result ?? ''; }

    /** @var array<string, mixed> */
    public array $data { get => $this->data ?? []; }

    /**
     * @return array<string, mixed>|null
     */
    public function getNewPurchase(): ?array
    {
        $newPurchase = $this->data['new_purchase'] ?? null;
        if ($newPurchase !== null && ! is_array($newPurchase)) {
            return null;
        }
        if ($newPurchase === null) {
            return null;
        }
        /** @var array<string, mixed> $validated */
        $validated = $newPurchase;

        return $validated;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getUpgradeInfo(): ?array
    {
        $upgradeInfo = $this->data['upgrade_info'] ?? null;
        if ($upgradeInfo !== null && ! is_array($upgradeInfo)) {
            return null;
        }
        if ($upgradeInfo === null) {
            return null;
        }
        /** @var array<string, mixed> $validated */
        $validated = $upgradeInfo;

        return $validated;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];
        if (! is_array($responseData)) {
            $responseData = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->data = $validatedData;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
