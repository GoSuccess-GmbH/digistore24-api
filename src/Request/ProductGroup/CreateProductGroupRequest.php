<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Product Group Request
 *
 * Creates a new product group for organizing related products.
 */
final class CreateProductGroupRequest extends AbstractRequest
{
    /**
     * @param array $data The product group configuration (name, description, products, etc.)
     */
    public function __construct(private array $data) {}

    public function getEndpoint(): string { return 'createProductGroup'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array { return $this->data; }
}
