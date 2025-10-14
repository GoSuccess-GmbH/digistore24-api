<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ProductGroup;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class UpdateProductGroupRequest extends AbstractRequest
{
    public function __construct(private string $productGroupId, private array $data) {}
    public function getEndpoint(): string { return 'updateProductGroup'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return array_merge(['product_group_id' => $this->productGroupId], $this->data);
    }
}
