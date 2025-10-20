<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Delivery;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\DTO\DeliveryDetailsData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Get Delivery Response
 *
 * Response object for the Delivery API endpoint.
 */
final class GetDeliveryResponse extends AbstractResponse
{
    /**
     * Delivery details
     */
    public DeliveryDetailsData $delivery {
        get => $this->delivery;
    }

    /**
     * Whether delivery was marked as in progress
     */
    public bool $isSetInProgress {
        get => $this->isSetInProgress;
    }

    /**
     * Reason why setting in progress failed, if applicable
     */
    public ?string $setInProgressFailReason {
        get => $this->setInProgressFailReason;
    }

    public function __construct(
        DeliveryDetailsData $delivery,
        bool $isSetInProgress,
        ?string $setInProgressFailReason = null,
    ) {
        $this->delivery = $delivery;
        $this->isSetInProgress = $isSetInProgress;
        $this->setInProgressFailReason = $setInProgressFailReason;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);

        $deliveryData = $innerData['delivery'] ?? [];
        if (! is_array($deliveryData)) {
            $deliveryData = [];
        }

        /** @var array<string, mixed> $validDeliveryData */
        $validDeliveryData = $deliveryData;

        return new self(
            delivery: DeliveryDetailsData::fromArray($validDeliveryData),
            isSetInProgress: TypeConverter::toBool($innerData['is_set_in_progress'] ?? null) ?? false,
            setInProgressFailReason: TypeConverter::toString($innerData['set_in_progress_fail_reason'] ?? null),
        );
    }
}
