<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Product\CopyProductResponse;
use GoSuccess\Digistore24\Models\Product\CreateProductResponse;
use GoSuccess\Digistore24\Models\Product\Product;

class ProductController extends Controller
{
    /**
     * Create a new Product
     * @link https://dev.digistore24.com/en/articles/22-createproduct
     * @param Product|null $product
     * @return CreateProductResponse|null
     */
    public function create(?Product $product = null): ?CreateProductResponse
    {
        $data = $this->api->call('createProduct', (array) $product);
        
        if (!$data) {
            return null;
        }

        return new CreateProductResponse($data);
    }
    
    /**
     * Copy a product
     * @link https://dev.digistore24.com/en/articles/16-copyproduct
     * @param int $productId
     * @param Product|null $productData
     * @return CopyProductResponse|null
     */
    public function copy(int $productId, ?Product $productData = null): ?CopyProductResponse
    {
        $data = $this->api->call('copyProduct', $productId, (array) $productData);
        
        if (!$data) {
            return null;
        }

        return new CopyProductResponse($data);
    }

    /**
     * Get product details
     * @link https://dev.digistore24.com/en/articles/48-getproduct
     * @param int $productId
     * @return Product|null
     */
    public function get(int $productId): ?Product
    {
        $data = $this->api->call('getProduct', $productId);
        
        if (!$data) {
            return null;
        }

        return new Product($data);
    }

    /**
     * Get a sorted list of your Digistore24 products
     * @link https://dev.digistore24.com/en/articles/80-listproducts
     * @param string $sortBy Sort by "name" or "group"
     * @return array<Product>|null
     */
    public function list(string $sortBy = 'name'): ?array
    {
        $data = $this->api->call('listProducts', $sortBy);
        
        if (!$data) {
            return null;
        }

        return $this->mapToModels($data->products, Product::class);
    }
}
