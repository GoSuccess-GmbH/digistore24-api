<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Requests\BuyUrl;

use GoSuccess\Digistore24\Contracts\AbstractRequest;
use GoSuccess\Digistore24\DataObjects\BuyerData;
use GoSuccess\Digistore24\DataObjects\PaymentPlanData;
use GoSuccess\Digistore24\DataObjects\TrackingData;

/**
 * Create Buy URL Request
 * 
 * Request object for creating a customized order form URL.
 * Uses PHP 8.4 readonly properties and property hooks for validation.
 * 
 * @link https://digistore24.com/api/docs/paths/createBuyUrl.yaml
 */
readonly class CreateBuyUrlRequest extends AbstractRequest
{
    public string|int $productId;
    public ?BuyerData $buyer;
    public ?PaymentPlanData $paymentPlan;
    public ?TrackingData $tracking;
    public string $validUntil;
    public ?array $urls;
    public ?array $placeholders;
    public ?array $settings;
    public ?array $addons;

    public function __construct(
        string|int $productId,
        ?BuyerData $buyer = null,
        ?PaymentPlanData $paymentPlan = null,
        ?TrackingData $tracking = null,
        string $validUntil = '24h',
        ?array $urls = null,
        ?array $placeholders = null,
        ?array $settings = null,
        ?array $addons = null,
    ) {
        if (empty($productId)) {
            throw new \InvalidArgumentException('Product ID is required');
        }
        
        $this->productId = $productId;
        $this->buyer = $buyer;
        $this->paymentPlan = $paymentPlan;
        $this->tracking = $tracking;
        $this->validUntil = $validUntil;
        $this->urls = $urls;
        $this->placeholders = $placeholders;
        $this->settings = $settings;
        $this->addons = $addons;
    }

    public function endpoint(): string
    {
        return 'createBuyUrl';
    }

    protected function rules(): array
    {
        return [
            'product_id' => [
                'rule' => 'required',
                'message' => 'Product ID is required',
            ],
        ];
    }
}
