<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Get Product Group Request
 *
 * Retrieves detailed information about a specific product group.
 */
final class GetProductGroupRequest extends AbstractRequest
{
    /**
     * @param string $productGroupId The unique identifier of the product group
     */
    public function __construct(private string $productGroupId) {}

    public function getEndpoint(): string { return 'getProductGroup'; }

    public function method(): Method { return Method::GET; }

    public function toArray(): array { return ['product_group_id' => $this->productGroupId]; }
}
