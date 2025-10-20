<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Buyer;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Update Buyer Response
 *
 * Response for updating buyer contact details.
 */
final class UpdateBuyerResponse extends AbstractResponse
{
    /**
     * Whether the buyer was modified
     */
    public bool $isModified = false {
        get => $this->isModified;
    }

    public function __construct(bool $isModified = false)
    {
        $this->isModified = $isModified;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? $data;

        if (! is_array($responseData)) {
            $responseData = [];
        }

        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        $isModified = TypeConverter::toBool($validatedData['is_modified'] ?? 'N') ?? false;

        $instance = new self(isModified: $isModified);

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
