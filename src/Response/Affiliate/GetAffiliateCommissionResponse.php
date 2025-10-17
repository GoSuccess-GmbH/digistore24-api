<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\DataTransferObject\AffiliationData;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Affiliate Commission Response
 *
 * Response object for the Affiliate API endpoint.
 */
final class GetAffiliateCommissionResponse extends AbstractResponse
{
    /**
     * Array of affiliation commission data
     *
     * @var AffiliationData[]
     */
    public array $affiliations {
        get => $this->affiliations;
    }

    /**
     * Affiliate ID
     */
    public string $affiliateId {
        get => $this->affiliateId;
    }

    /**
     * Affiliate name
     */
    public string $affiliateName {
        get => $this->affiliateName;
    }

    /**
     * @param AffiliationData[] $affiliations
     * @param string $affiliateId
     * @param string $affiliateName
     */
    public function __construct(
        array $affiliations,
        string $affiliateId,
        string $affiliateName,
    ) {
        $this->affiliations = $affiliations;
        $this->affiliateId = $affiliateId;
        $this->affiliateName = $affiliateName;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);

        $affiliationsData = $innerData['affiliations'] ?? [];
        $affiliations = [];

        if (is_array($affiliationsData)) {
            foreach ($affiliationsData as $affiliationItem) {
                if (is_array($affiliationItem)) {
                    /** @var array<string, mixed> $validAffiliationItem */
                    $validAffiliationItem = $affiliationItem;
                    $affiliations[] = AffiliationData::fromArray($validAffiliationItem);
                }
            }
        }

        $affiliateId = '';
        if (isset($innerData['affiliate_id']) && is_string($innerData['affiliate_id'])) {
            $affiliateId = $innerData['affiliate_id'];
        }

        $affiliateName = '';
        if (isset($innerData['affiliate_name']) && is_string($innerData['affiliate_name'])) {
            $affiliateName = $innerData['affiliate_name'];
        }

        return new self(
            affiliations: $affiliations,
            affiliateId: $affiliateId,
            affiliateName: $affiliateName,
        );
    }
}
