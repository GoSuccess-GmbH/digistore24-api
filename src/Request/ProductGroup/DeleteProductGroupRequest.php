<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ProductGroup;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class DeleteProductGroupRequest extends AbstractRequest
{
    public function __construct(private string $productGroupId) {}
    public function endpoint(): string { return 'deleteProductGroup'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return ['product_group_id' => $this->productGroupId]; }
}
