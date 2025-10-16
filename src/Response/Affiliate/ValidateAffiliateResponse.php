<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Validate Affiliate Response
 *
 * Response object for the Affiliate API endpoint.
 */
final class ValidateAffiliateResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(private bool $isValid, private array $data)
    {
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $responseData = $data['data'] ?? [];

        if (!is_array($responseData)) {
            $responseData = [];
        }

        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        return new self(
            isValid: (bool)($innerData['is_valid'] ?? false),
            data: $validatedData,
        );
    }
}
