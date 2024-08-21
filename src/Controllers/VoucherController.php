<?php

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Voucher\Coupon;

class VoucherController extends Controller
{
    /**
     * Get voucher code details.
     * @link https://dev.digistore24.com/en/articles/58-getvoucher
     * @param string $code
     * @return Coupon|null
     */
    public function get( string $code ): ?Coupon
    {
        $data = $this->api->call(
            'getVoucher',
            $code
        );
        
        if( ! $data )
        {
            return null;
        }

        return new Coupon( $data->coupon );
    }
}
