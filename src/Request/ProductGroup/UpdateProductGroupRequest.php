<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ProductGroup;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateProductGroupRequest extends AbstractRequest
{
    public function __construct(private string $productGroupId, private array $data) {}
    public function getEndpoint(): string { return 'updateProductGroup'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['product_group_id' => $this->productGroupId], $this->data);
    }
}
