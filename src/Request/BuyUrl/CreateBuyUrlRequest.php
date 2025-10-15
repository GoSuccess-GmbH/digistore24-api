<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DTO\BuyerData;
use GoSuccess\Digistore24\Api\DTO\PaymentPlanData;
use GoSuccess\Digistore24\Api\DTO\SettingsData;
use GoSuccess\Digistore24\Api\DTO\TrackingData;
use GoSuccess\Digistore24\Api\DTO\UrlsData;

/**
 * Create Buy URL Request
 *
 * Request object for creating a customized order form URL.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createBuyUrl.yaml
 */
final class CreateBuyUrlRequest extends AbstractRequest
{
    public string|int $productId {
        set {
            if (empty($value)) {
                throw new \InvalidArgumentException('Product ID is required');
            }
            $this->productId = $value;
        }
    }

    public ?BuyerData $buyer = null;

    public ?PaymentPlanData $paymentPlan = null;

    public ?TrackingData $tracking = null;

    public string $validUntil = '24h';

    public ?UrlsData $urls = null;

    public ?array $placeholders = null;

    public ?SettingsData $settings = null;

    public ?array $addons = null;

    public function getEndpoint(): string
    {
        return '/createBuyUrl';
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
