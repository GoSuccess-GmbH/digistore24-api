<?php

namespace GoSuccess\Digistore24\Controllers;
use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Buyer\Buyer;

class BuyerController extends Controller
{
    /**
     * Get specific buyer by id.
     * @link https://dev.digistore24.com/en/articles/39-getbuyer
     * @param int $buyer_id
     * @return Buyer|null
     */
    public function get( int $buyer_id ): ?Buyer
    {
        $data = $this->api->call(
            'getBuyer',
            $buyer_id
        );

        if( ! $data )
        {
            return null;
        }

        return new Buyer( $data->buyer );
    }
}
