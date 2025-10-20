<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Rebilling;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\DTO\RebillingData;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Stop Rebilling Response
 *
 * Response for stopping rebilling payments.
 * Contains detailed information about cancellation status and timing.
 */
final class StopRebillingResponse extends AbstractResponse
{
    /**
     * Result status
     */
    public string $result = '' {
        get => $this->result;
    }

    /**
     * Rebilling data including cancellation details
     */
    public ?RebillingData $data = null {
        get => $this->data;
    }

    public function __construct(string $result = '', ?RebillingData $data = null)
    {
        $this->result = $result;
        $this->data = $data;
    }

    /**
     * Check if operation was successful
     */
    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $rebillingData = empty($innerData) ? null : RebillingData::fromArray($innerData);

        $instance = new self(
            result: self::extractResult($data, $rawResponse),
            data: $rebillingData,
        );

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
