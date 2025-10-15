# Create Buy URL

Creates a customized order form URL with pre-filled data, custom pricing, and tracking.

## Endpoint

`POST /createBuyUrl`

## Description

Creates a special order form URL that can be customized for the visitor. For example, customer data can be entered and set as read-only. Prices can also be changed.

This is useful for:
- Creating personalized order links for specific customers
- Pre-filling customer information
- Offering special pricing or payment plans
- Tracking specific campaigns or affiliates
- Creating upgrade or downgrade links

## Request Parameters

| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|
| `product_id` | string | Yes | - | The ID of the product in Digistore24 |
| `buyer` | object | No | - | Buyer data (see Buyer structure below) |
| `payment_plan` | object | No | - | Purchase price/payment plan data |
| `tracking` | object | No | - | Tracking data for analytics |
| `valid_until` | string | No | 24h | Time period until link becomes invalid. Use 'forever' for no expiration. |
| `urls` | object | No | - | Custom URLs for thank you page, fallback, etc. |
| `placeholders` | object | No | - | Placeholders for product title and description |
| `settings` | object | No | - | Additional order form settings |
| `addons` | array | No | - | List of add-on products |

### Buyer Structure

| Field | Type | Description |
|-------|------|-------------|
| `email` | string | Email address |
| `salutation` | string | M (male) or F (female) |
| `title` | string | e.g. "Prof." or "Dr." |
| `first_name` | string | First name |
| `last_name` | string | Last name |
| `company` | string | Company name |
| `street` | string | Street address |
| `city` | string | City |
| `zipcode` | string | Postal code |
| `state` | string | State/province |
| `country` | string | Two-digit country code |
| `phone_no` | string | Phone number |
| `tax_id` | string | Tax ID/VAT number |
| `readonly_keys` | string | Which fields are read-only: all, email, email_and_name, none (default: none) |
| `id` | string | Buyer ID or order ID to use existing address |

### Payment Plan Structure

| Field | Type | Description |
|-------|------|-------------|
| `first_amount` | number | Purchase price or first payment amount |
| `other_amounts` | number | Amount for follow-up payments |
| `currency` | string | Three-digit currency code (e.g. EUR or USD) |
| `number_of_installments` | integer | Number of payments (1=single payment, 0=subscription) |
| `first_billing_interval` | string | Time interval between purchase and second installment |
| `other_billing_intervals` | string | Time interval for second and further payments |
| `test_interval` | string | Test period before payment starts |
| `template` | string | ID of payment method template |
| `upgrade_order_id` | string | Order ID for upgrade purchase |
| `upgrade_type` | string | Type of upgrade: upgrade or downgrade |
| `tax_mode` | string | Tax calculation mode: as_set, exclude, include |

### Tracking Structure

| Field | Type | Description |
|-------|------|-------------|
| `custom` | string | Custom value for order reference |
| `affiliate` | string | Affiliate's Digistore24 ID |
| `affiliate_priority` | string | Priority for affiliate selection: email, as_set |
| `campaignkey` | string | Campaign key of the affiliate |
| `trackingkey` | string | Vendor's tracking key |
| `utm_source` | string | UTM source parameter |
| `utm_medium` | string | UTM medium parameter |
| `utm_campaign` | string | UTM campaign parameter |
| `utm_term` | string | UTM term parameter |
| `utm_content` | string | UTM content parameter |

### URLs Structure

| Field | Type | Description |
|-------|------|-------------|
| `thankyou_url` | string | Custom thank you page URL |
| `fallback_url` | string | URL for invalid links |
| `upgrade_error_url` | string | URL for failed upgrades |

### Settings Structure

| Field | Type | Description |
|-------|------|-------------|
| `orderform_id` | string | ID of the order form |
| `img` | string/object | Product image ID or mapping |
| `affiliate_commission_rate` | number | Affiliate commission percentage |
| `affiliate_commission_fix` | number | Fixed affiliate commission amount |
| `voucher_code` | string | Voucher code to apply |
| `voucher_1st_rate` | number | Discount percentage on first payment |
| `voucher_oth_rates` | number | Discount percentage on follow-up payments |
| `voucher_1st_amount` | number | Discount amount on first payment |
| `voucher_oth_amounts` | number | Discount amount on follow-up payments |
| `force_rebilling` | boolean | Require payment method supporting automated payments |
| `pay_methods` | array | Allowed payment methods (paypal, sezzle, creditcard, elv, banktransfer, klarna) |

### Addon Structure

| Field | Type | Description |
|-------|------|-------------|
| `product_id` | string | Product ID of addon |
| `first_amount` | number | First payment amount for subscription/installment |
| `other_amounts` | number | Follow-up payment amounts |
| `single_amount` | number | Purchase amount for single payments |
| `default_quantity` | integer | Preselected quantity (minimum: 1, default: 1) |
| `max_quantity_type` | string | Maximum quantity type: unlimited, like_main_item, number |
| `max_quantity` | integer | Maximum purchasable quantity |
| `currency` | string | Three-character currency code |
| `is_quantity_editable_before_purchase` | string | Can buyer change quantity before purchase (Y/N) |
| `is_quantity_editable_after_purchase` | string | Can buyer change quantity after purchase (Y/N) |

## Response

### Success Response (200 OK)

```json
{
  "id": "342033068",
  "url": "https://www.digistore24.com/offer/342033068/vzJd5b3qByzt/12345",
  "valid_until": "2025-10-15T17:59:19Z",
  "upgrade_status": "none"
}
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `id` | string | ID of the BuyUrl object |
| `url` | string | Order URL for purchase |
| `valid_until` | string | Expiration date of the URL (ISO 8601 format) |
| `upgrade_status` | string | Status of upgrade possibility: none, ok, error |

### Error Responses

#### 400 Bad Request
Invalid request parameters.

#### 403 Forbidden
Access denied - Full access required.

## PHP Example

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\BuyerData;

$config = new Configuration('YOUR-API-KEY');
$ds24 = new Digistore24($config);

// Create a basic buy URL
$request = new CreateBuyUrlRequest(productId: '12345');
$request->validUntil = '+10m'; // 10 minutes valid from now

try {
    $response = $ds24->buyUrls->create($request);
    
    echo "Buy URL: {$response->url}\n";
    echo "ID: {$response->id}\n";
    echo "Valid until: {$response->validUntil->format('Y-m-d H:i:s')}\n";
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

## Example: Pre-filled Customer Data

```php
use GoSuccess\Digistore24\Api\DataTransferObject\BuyerData;

// Create buyer data
$buyer = new BuyerData();
$buyer->email = 'customer@example.com';
$buyer->firstName = 'John';
$buyer->lastName = 'Doe';
$buyer->city = 'Berlin';
$buyer->country = 'DE';

// Create request with pre-filled data
$request = new CreateBuyUrlRequest(productId: '12345');
$request->buyer = $buyer;
$request->validUntil = '48h'; // Valid for 48 hours

$response = $ds24->buyUrls->create($request);
echo "Personalized URL: {$response->url}\n";
```

## Example: Custom Pricing

```php
use GoSuccess\Digistore24\Api\DataTransferObject\PaymentPlanData;

// Create custom payment plan
$paymentPlan = new PaymentPlanData();
$paymentPlan->firstAmount = 99.00;
$paymentPlan->currency = 'EUR';
$paymentPlan->numberOfInstallments = 1; // Single payment

$request = new CreateBuyUrlRequest(productId: '12345');
$request->paymentPlan = $paymentPlan;

$response = $ds24->buyUrls->create($request);
echo "Custom price URL: {$response->url}\n";
```

## Example: With Tracking

```php
use GoSuccess\Digistore24\Api\DataTransferObject\TrackingData;

// Create tracking data
$tracking = new TrackingData();
$tracking->affiliate = 'AFFILIATE123';
$tracking->utmSource = 'email';
$tracking->utmCampaign = 'summer2025';
$tracking->custom = 'customer-segment-A';

$request = new CreateBuyUrlRequest(productId: '12345');
$request->tracking = $tracking;

$response = $ds24->buyUrls->create($request);
echo "Tracked URL: {$response->url}\n";
```

## Important Notes

- Only `product_id` is mandatory
- The `valid_until` parameter accepts relative time (e.g., '+10m', '24h', '7d') or 'forever'
- Use `readonly_keys` in buyer data to prevent customers from changing pre-filled information
- Buy URLs are perfect for email marketing campaigns with personalized offers
- Tracking parameters help you analyze which sources generate the most sales
- Custom payment plans allow you to offer special pricing to specific customers
- The URL is automatically invalidated after expiration
- Upgrade URLs require `upgrade_order_id` in the payment plan

## Related Endpoints

- [List Buy URLs](listBuyUrls.md) - List all created buy URLs
- [Delete Buy URL](deleteBuyUrl.md) - Delete a buy URL
