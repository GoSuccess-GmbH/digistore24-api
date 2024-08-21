<?php

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Product\CopyProductResponse;
use GoSuccess\Digistore24\Models\Product\CreateProductResponse;
use GoSuccess\Digistore24\Models\Product\Product;
use stdClass;

class ProductController extends Controller
{
    /**
     * Create a new Product.
     * @link https://dev.digistore24.com/en/articles/22-createproduct
     * @param object $product
     * @return Product|null
     */
    public function create( Product $product = null ): ?CreateProductResponse
    {
        $data = $this->api->call(
            'createProduct',
            (array) $product
        );
        
        if( ! $data )
        {
            return null;
        }

        return new CreateProductResponse( $data );
    }
    
    /**
     * Copy a product.
     * @link https://dev.digistore24.com/en/articles/16-copyproduct
     * @param int $product_id
     * @param \GoSuccess\Digistore24\Models\Product\Product $product_data
     * @return int|null
     */
    public function copy( int $product_id, Product $product_data = null ): ?CopyProductResponse
    {
        $data = $this->api->call(
            'copyProduct',
            $product_id,
            (array) $product_data
        );
        
        if( ! $data )
        {
            return null;
        }

        return new CopyProductResponse( $data );
    }

    /**
     * Get product details.
     * @link https://dev.digistore24.com/en/articles/48-getproduct
     * @param int $product_id
     * @return Product|null
     */
    public function get( int $product_id ): ?Product
    {
        $data = $this->api->call(
            'getProduct',
            $product_id );
        
        if( ! $data )
        {
            return null;
        }

        return new Product( $data );
    }

    /**
     * Get a sorted list of your Digistore24 products.
     * @link https://dev.digistore24.com/en/articles/80-listproducts
     * @param string $sort_by   Sorty by "name" or "group"
     * @return Product[]|null
     */
    public function list( string $sort_by = 'name' ): ?array
    {
        $data = $this->api->call(
            'listProducts',
            $sort_by
        );
        
        if( ! $data )
        {
            return null;
        }

        return array_map(
            function( $data )
            {
                return new Product( $data );
            },
            $data->products
        );
    }
}
