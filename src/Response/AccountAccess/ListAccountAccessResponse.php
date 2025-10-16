<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\AccountAccess;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Account Access Response
 *
 * Response containing all logged member accesses for a purchase.
 */
final class ListAccountAccessResponse extends AbstractResponse
{
    /**
     * @param array<AccountAccessEntry> $accesses Array of access log entries
     */
    public function __construct(
        public readonly array $accesses,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $accesses = [];

        $accessData = $innerData['accesses'] ?? [];

        if (is_array($accessData)) {
            foreach ($accessData as $entry) {
                if (is_array($entry)) {
                    /** @var array<string, mixed> $validatedEntry */
                    $validatedEntry = $entry;
                    $accesses[] = AccountAccessEntry::fromArray($validatedEntry);
                }
            }
        }

        return new self(accesses: $accesses);
    }
}
