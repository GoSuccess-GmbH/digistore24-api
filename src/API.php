<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24;

use Exception;
use GoSuccess\Digistore24\Sdk\DigistoreApi;
use GoSuccess\Digistore24\Sdk\DigistoreApiException;
use GoSuccess\Digistore24\Controllers\AffiliateController;
use GoSuccess\Digistore24\Controllers\APIController;
use GoSuccess\Digistore24\Controllers\BillingController;
use GoSuccess\Digistore24\Controllers\BuyerController;
use GoSuccess\Digistore24\Controllers\BuyUrlController;
use GoSuccess\Digistore24\Controllers\CountryController;
use GoSuccess\Digistore24\Controllers\IPNController;
use GoSuccess\Digistore24\Controllers\MonitoringController;
use GoSuccess\Digistore24\Controllers\UserController;
use GoSuccess\Digistore24\Controllers\VoucherController;
use GoSuccess\Digistore24\Controllers\ProductController;
use GoSuccess\Digistore24\Controllers\PurchaseController;
use GoSuccess\Digistore24\Controllers\RebillingController;

class API
{
    /** @var array<int, DigistoreApiException|Exception|string> */
    private array $errors = [];
    
    private readonly DigistoreApi $api;
    
    public readonly MonitoringController $monitoring;
    public readonly ProductController $product;
    public readonly AffiliateController $affiliate;
    public readonly BuyerController $buyer;
    public readonly PurchaseController $purchase;
    public readonly UserController $user;
    public readonly VoucherController $voucher;
    public readonly IPNController $ipn;
    public readonly BillingController $billing;
    public readonly BuyUrlController $buyUrl;
    public readonly APIController $apiSetup;
    public readonly RebillingController $rebilling;
    public readonly CountryController $country;

    public function __construct(string $apiKey)
    {
        try {
            $this->api = DigistoreApi::connect($apiKey);
            $this->monitoring = new MonitoringController($this);
            $this->product = new ProductController($this);
            $this->affiliate = new AffiliateController($this);
            $this->buyer = new BuyerController($this);
            $this->purchase = new PurchaseController($this);
            $this->user = new UserController($this);
            $this->voucher = new VoucherController($this);
            $this->ipn = new IPNController($this);
            $this->billing = new BillingController($this);
            $this->buyUrl = new BuyUrlController($this);
            $this->country = new CountryController($this);
            $this->apiSetup = new APIController($this);
            $this->rebilling = new RebillingController($this);
        } catch (DigistoreApiException|Exception $e) {
            $this->errors[] = $e;
        }
    }

    /**
     * Call an API method dynamically
     *
     * @param string $action
     * @param mixed ...$arguments
     * @return mixed
     */
    public function call(string $action, mixed ...$arguments): mixed
    {
        try {
            return $this->api->$action(...$arguments);
        } catch (DigistoreApiException $e) {
            $this->errors[] = $e->getMessage();
            return null;
        }
    }

    /**
     * Get all errors that occurred
     *
     * @return array<int, DigistoreApiException|Exception|string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Get the last error that occurred
     *
     * @return DigistoreApiException|Exception|string|false
     */
    public function getLastError(): DigistoreApiException|Exception|string|false
    {
        return end($this->errors);
    }
}
