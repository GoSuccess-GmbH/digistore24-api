<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\AccountAccess;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\DTO\AccountAccessData;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Account Access Response
 *
 * Response containing account access permissions granted by and to the API key owner.
 */
final class ListAccountAccessResponse extends AbstractResponse
{
    /**
     * @var AccountAccessData[]
     */
    public array $byMe {
        get => $this->byMe;
    }

    /**
     * @var AccountAccessData[]
     */
    public array $toMe {
        get => $this->toMe;
    }

    /**
     * @param AccountAccessData[] $byMe Accounts you have granted access to
     * @param AccountAccessData[] $toMe Accounts you have been granted access to
     */
    public function __construct(
        array $byMe = [],
        array $toMe = [],
    ) {
        $this->byMe = $byMe;
        $this->toMe = $toMe;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);

        $byMe = [];
        $byMeData = $innerData['by_me'] ?? [];
        if (is_array($byMeData)) {
            foreach ($byMeData as $entry) {
                if (is_array($entry)) {
                    /** @var array<string, mixed> $validatedEntry */
                    $validatedEntry = $entry;
                    $byMe[] = AccountAccessData::fromArray($validatedEntry);
                }
            }
        }

        $toMe = [];
        $toMeData = $innerData['to_me'] ?? [];
        if (is_array($toMeData)) {
            foreach ($toMeData as $entry) {
                if (is_array($entry)) {
                    /** @var array<string, mixed> $validatedEntry */
                    $validatedEntry = $entry;
                    $toMe[] = AccountAccessData::fromArray($validatedEntry);
                }
            }
        }

        return new self(
            byMe: $byMe,
            toMe: $toMe,
        );
    }
}
