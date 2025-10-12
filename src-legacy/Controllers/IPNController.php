<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\IPN\IPN;
use GoSuccess\Digistore24\Models\IPN\DeleteResponse;
use GoSuccess\Digistore24\Models\IPN\Settings;
use GoSuccess\Digistore24\Models\IPN\SetupResponse;

class IPNController extends Controller
{
    /**
     * Setup IPN-Connection
     * @link https://dev.digistore24.com/en/articles/61-ipnsetup
     * @param Settings $ipnSettings
     * @return SetupResponse|null
     */
    public function create(Settings $ipnSettings): ?SetupResponse
    {
        $data = $this->api->call(
            'ipnSetup',
            $ipnSettings->ipn_url,
            $ipnSettings->name,
            $ipnSettings->product_ids,
            $ipnSettings->domain_id,
            array_map(
                fn($category): string => $category->value,
                $ipnSettings->categories
            ),
            array_map(
                fn($transaction): string => $transaction->value,
                $ipnSettings->transactions
            ),
            $ipnSettings->timing->value,
            $ipnSettings->sha_passphrase,
            $ipnSettings->newsletter_send_policy->value
        );
        
        if (!$data) {
            return null;
        }

        return new SetupResponse($data);
    }

    /**
     * Get IPN-Connection info
     * @link https://dev.digistore24.com/en/articles/60-ipninfo
     * @param string $domainId
     * @return IPN|null
     */
    public function get(string $domainId): ?IPN
    {
        $data = $this->api->call('ipnInfo', $domainId);
        
        if (!$data) {
            return null;
        }

        return new IPN($data);
    }

    /**
     * Delete IPN-Connection
     * @link https://dev.digistore24.com/en/articles/59-ipndelete
     * @param string $domainId
     * @return DeleteResponse|null
     */
    public function delete(string $domainId): ?DeleteResponse
    {
        $data = $this->api->call('ipnDelete', $domainId);
        
        if (!$data) {
            return null;
        }

        return new DeleteResponse($data);
    }
}
