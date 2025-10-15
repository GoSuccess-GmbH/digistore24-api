<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Upsell;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Update Upsells Request
 *
 * Updates the upsell configuration for a specific product.
 */
final class UpdateUpsellsRequest extends AbstractRequest
{
    /**
     * @param int $productId The unique identifier of the product
     * @param array $data The upsell configuration (upsell products, order, conditions, etc.)
     */
    public function __construct(private int $productId, private array $data) {}

    public function getEndpoint(): string { return 'updateUpsells'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array
    {
        return array_merge(['product_id' => $this->productId], $this->data);
    }
}
