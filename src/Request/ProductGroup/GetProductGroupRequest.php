<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ProductGroup;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetProductGroupRequest extends AbstractRequest
{
    public function __construct(private string $productGroupId) {}
    public function getEndpoint(): string { return 'getProductGroup'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['product_group_id' => $this->productGroupId]; }
}
