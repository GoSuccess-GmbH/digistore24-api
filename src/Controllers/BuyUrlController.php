<?php

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\BuyUrl\BuyUrl;
use GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlResponse;
use GoSuccess\Digistore24\Models\BuyUrl\DeleteBuyUrlResponse;

class BuyUrlController extends Controller
{
    /**
     * Creates an special order URL.
     * @link https://dev.digistore24.com/en/articles/18-createbuyurl
     * @param \GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlRequest $buy_url
     * @return CreateBuyUrlResponse|null
     */
    public function create( CreateBuyUrlRequest $buy_url ): ?CreateBuyUrlResponse
    {
        $data = $this->api->call(
            'createBuyUrl',
            $buy_url->product_id,
            $buy_url->buyer === null ? [] : get_object_vars( $buy_url->buyer ),
            $buy_url->payment_plan === null ? [] : get_object_vars( $buy_url->payment_plan ),
            $buy_url->tracking === null ? [] : get_object_vars( $buy_url->tracking ),
            $buy_url->valid_until,
            $buy_url->urls === null ? [] : get_object_vars( $buy_url->urls ),
            $buy_url->placeholders,
            $buy_url->settings === null ? [] : get_object_vars( $buy_url->settings ),
            $buy_url->addons === null ? [] : array_map(
                function( $addon )
                {
                    return get_object_vars( $addon );
                },
                $buy_url->addons
            ),
        );
        
        if( ! $data )
        {
            return null;
        }

        return new CreateBuyUrlResponse( $data );
    }

    /**
     * List generated order URLs.
     * @link https://dev.digistore24.com/en/articles/64-listbuyurls
     * @param int $page_no
     * @param int $page_size
     * @return BuyUrl[]|null
     */
    public function list( int $page_no = 1, int $page_size = 1000 ): ?array
    {
        $data = $this->api->call(
            'listBuyUrls',
            $page_no,
            $page_size
        );
        
        if( ! $data )
        {
            return null;
        }

        return array_map(
            function( $buy_url )
            {
                return new BuyUrl( $buy_url );
            },
            $data->buyurls
        );
    }

    /**
     * Delete a generated form URL.
     * @link https://dev.digistore24.com/en/articles/28-deletebuyurl
     * @param int $buy_url_id
     * @return DeleteBuyUrlResponse|null
     */
    public function delete( int $buy_url_id ): ?DeleteBuyUrlResponse
    {
        $data = $this->api->call(
            'deleteBuyUrl',
            $buy_url_id
        );
        
        if( ! $data )
        {
            return null;
        }

        return new DeleteBuyUrlResponse( $data );
    }
}
