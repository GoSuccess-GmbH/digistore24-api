<?php

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\IPN\IPN;
use GoSuccess\Digistore24\Models\IPN\DeleteResponse;
use GoSuccess\Digistore24\Models\IPN\Settings;
use GoSuccess\Digistore24\Models\IPN\SetupResponse;

class IPNController extends Controller
{
    /**
     * Setup IPN-Connection.
     * @link https://dev.digistore24.com/en/articles/61-ipnsetup
     * @param \GoSuccess\Digistore24\Models\IPN\Settings $ipn_settings
     * @return SetupResponse|null
     */
    public function create( Settings $ipn_settings ): ?SetupResponse
    {
        $data = $this->api->call(
            'ipnSetup',
            $ipn_settings->ipn_url,
            $ipn_settings->name,
            $ipn_settings->product_ids,
            $ipn_settings->domain_id,
            array_map(
                function( $category )
                {
                    return $category->value;
                },
                $ipn_settings->categories
            ),
            array_map(
                function( $transaction )
                {
                    return $transaction->value;
                },
                $ipn_settings->transactions
            ),
            $ipn_settings->timing->value,
            $ipn_settings->sha_passphrase,
            $ipn_settings->newsletter_send_policy->value
        );
        
        if( ! $data )
        {
            return null;
        }

        return new SetupResponse( $data );
    }

    /**
     * Get IPN-Connection info.
     * @link https://dev.digistore24.com/en/articles/60-ipninfo
     * @param string $domain_id
     * @return IPN|null
     */
    public function get( string $domain_id ): ?IPN
    {
        $data = $this->api->call(
            'ipnInfo',
            $domain_id
        );
        
        if( ! $data )
        {
            return null;
        }

        return new IPN( $data );
    }

    /**
     * Delete IPN-Connection.
     * @link https://dev.digistore24.com/en/articles/59-ipndelete
     * @param string $domain_id
     * @return DeleteResponse|null
     */
    public function delete( string $domain_id ): ?DeleteResponse
    {
        $data = $this->api->call(
            'ipnDelete',
            $domain_id
        );
        
        if( ! $data )
        {
            return null;
        }

        return new DeleteResponse( $data );
    }
}
