<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\ProductGroup;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListProductGroupsResponse extends AbstractResponse
{
    public function __construct(private array $productGroups) {}
    public function getProductGroups(): array { return $this->productGroups; }
    public static function fromArray(array $data): self
    {
        return new self(productGroups: $data['data']['product_groups'] ?? []);
    }
}
