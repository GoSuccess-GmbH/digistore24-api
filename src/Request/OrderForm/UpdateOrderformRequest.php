<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\OrderFormData;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Update Order Form Request
 *
 * Updates an existing order form's configuration.
 */
final class UpdateOrderformRequest extends AbstractRequest
{
    /**
     * @param string $orderformId The unique identifier of the order form to update
     * @param OrderFormData $orderForm The updated order form configuration data
     */
    public function __construct(private string $orderformId, private OrderFormData $orderForm)
    {
    }

    public function getEndpoint(): string
    {
        return '/updateOrderform';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return array_merge(['orderform_id' => $this->orderformId], $this->orderForm->toArray());
    }
}
