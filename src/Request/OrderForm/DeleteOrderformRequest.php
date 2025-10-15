<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Delete Order Form Request
 *
 * Deletes an existing order form by its unique identifier.
 */
final class DeleteOrderformRequest extends AbstractRequest
{
    /**
     * @param string $orderformId The unique identifier of the order form to delete
     */
    public function __construct(private string $orderformId) {}

    public function getEndpoint(): string { return '/deleteOrderform'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array { return ['orderform_id' => $this->orderformId]; }
}
