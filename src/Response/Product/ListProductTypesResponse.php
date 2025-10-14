<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Response containing list of available product types.
 *
 * Returns an array of product type objects, each containing:
 * - id: Product type ID (integer)
 * - name: Product type name (string)
 * - category: Product type category (string)
 *
 * @see https://digistore24.com/api/docs/paths/listProductTypes.yaml
 */
final readonly class ListProductTypesResponse extends AbstractResponse
{
    /**
     * @param array<int, object{id: int, name: string, category: string}> $productTypes
     */
    public function __construct(
        private array $productTypes,
    ) {}

    /**
     * Get all product types.
     *
     * @return array<int, object{id: int, name: string, category: string}>
     */
    public function getProductTypes(): array
    {
        return $this->productTypes;
    }

    /**
     * Get a specific product type by ID.
     *
     * @param int $id Product type ID
     * @return object{id: int, name: string, category: string}|null Product type object or null if not found
     */
    public function getProductTypeById(int $id): ?object
    {
        foreach ($this->productTypes as $type) {
            if ($type->id === $id) {
                return $type;
            }
        }
        return null;
    }

    /**
     * Get all product types in a specific category.
     *
     * @param string $category Category name
     * @return array<int, object{id: int, name: string, category: string}>
     */
    public function getProductTypesByCategory(string $category): array
    {
        return array_filter(
            $this->productTypes,
            fn($type) => $type->category === $category
        );
    }

    /**
     * Get unique categories from all product types.
     *
     * @return array<int, string>
     */
    public function getCategories(): array
    {
        $categories = array_map(fn($type) => $type->category, $this->productTypes);
        return array_values(array_unique($categories));
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data): self
    {
        // API returns array of product type objects directly
        $productTypes = array_map(
            fn($item) => (object) [
                'id' => (int) $item['id'],
                'name' => (string) $item['name'],
                'category' => (string) $item['category'],
            ],
            $data
        );

        return new self($productTypes);
    }
}
