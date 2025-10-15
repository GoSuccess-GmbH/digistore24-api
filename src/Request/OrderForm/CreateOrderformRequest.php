<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Order Form Request
 *
 * Creates a new order form with the specified configuration.
 */
final class CreateOrderformRequest extends AbstractRequest
{
    /**
     * @param array $data The order form configuration data (name, products, settings, etc.)
     */
    public function __construct(private array $data) {}

    public function getEndpoint(): string { return 'createOrderform'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array { return $this->data; }
}
