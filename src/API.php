<?php

namespace GoSuccess\Digistore24;

use Exception;
use GoSuccess\Digistore24\Sdk\DigistoreApi;
use GoSuccess\Digistore24\Sdk\DigistoreApiException;
use GoSuccess\Digistore24\Controllers\AffiliateController;
use GoSuccess\Digistore24\Controllers\BillingController;
use GoSuccess\Digistore24\Controllers\BuyerController;
use GoSuccess\Digistore24\Controllers\BuyUrlController;
use GoSuccess\Digistore24\Controllers\IPNController;
use GoSuccess\Digistore24\Controllers\MonitoringController;
use GoSuccess\Digistore24\Controllers\UserController;
use GoSuccess\Digistore24\Controllers\VoucherController;
use GoSuccess\Digistore24\Controllers\ProductController;
use GoSuccess\Digistore24\Controllers\PurchaseController;

class API
{
    private array $errors = [];
    private DigistoreApi $api;
    public MonitoringController $monitoring;
    public ProductController $product;
    public AffiliateController $affiliate;
    public BuyerController $buyer;
    public PurchaseController $purchase;
    public UserController $user;
    public VoucherController $voucher;
    public IPNController $ipn;
    public BillingController $billing;
    public BuyUrlController $buy_url;

    public function __construct( string $api_key )
    {
        try
        {
            $this->api = DigistoreApi::connect( $api_key );
            $this->monitoring = new MonitoringController( $this );
            $this->product = new ProductController( $this );
            $this->affiliate = new AffiliateController( $this );
            $this->buyer = new BuyerController( $this );
            $this->purchase = new PurchaseController( $this );
            $this->user = new UserController( $this );
            $this->voucher = new VoucherController( $this );
            $this->ipn = new IPNController( $this );
            $this->billing = new BillingController( $this );
            $this->buy_url = new BuyUrlController( $this );
        }
        catch( DigistoreApiException|Exception $e )
        {
            $this->errors[] = $e;
        }
    }

    public function call( string $action, mixed ...$arguments ): mixed
    {
        try
        {
            $result = $this->api->$action( ...$arguments );
        }
        catch( DigistoreApiException $e )
        {
            $this->errors[] = $e->getMessage();
            return null;
        }

        return $result;
    }

    public function get_errors(): array
    {
        return $this->errors;
    }

    public function get_last_error(): DigistoreApiException
    {
        return end( $this->errors );
    }
}
