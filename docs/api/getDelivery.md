# getDelivery# getDelivery# getDelivery



Get details of a specific delivery.



## EndpointGet details of a specific delivery.Get details of a specific delivery.



```

GET /api/getDelivery

```## Endpoint## Endpoint



## Request Parameters



| Parameter | Type | Required | Description |``````

|-----------|------|----------|-------------|

| `delivery_id` | int | Yes | Delivery ID |GET /json/getDeliveryPOST /json/getDelivery

| `set_in_progress` | bool | No | Set delivery status to "in progress" (default: false) |

``````

## Response Structure (PHP)



```php

GoSuccess\Digistore24\Api\Response\Delivery\GetDeliveryResponse:## Request Parameters## Request Parameters

  delivery: DeliveryDetailsData

    id: int

    purchaseId: string

    purchaseCreatedAt: ?DateTimeImmutable| Parameter | Type | Required | Description || Parameter | Type | Required | Description |

    purchaseItemId: int

    buyerAddressId: int|-----------|------|----------|-------------||-----------|------|----------|-------------|

    type: string

    processedAt: ?DateTimeImmutable| `delivery_id` | int | Yes | Delivery ID || `delivery_id` | int | Yes | Delivery ID |

    processedBy: string

    productId: int| `set_in_progress` | bool | No | Set delivery status to "in progress" (default: false) |

    productName: string

    productTypeId: int## Response

    productTypeName: string

    variantLabel: string## Response Structure (PHP)

    variantName: string

    variantKey: string```php

    variantId: int

    quantityDelivered: int```php[

    quantityTotal: int

    isShippmentByResellerId: stringGoSuccess\Digistore24\Api\Response\Delivery\GetDeliveryResponse:    'result' => 'success',

    isTestOrder: bool

    deliveryType: string  delivery: DeliveryDetailsData    'data' => [

    invoiceUrl: string

    deliverySlipUrl: string    id: int        'delivery_id' => 123,

    deliveryAddress: DeliveryAddressData

      title: string    purchaseId: string        'purchase_id' => 'ABC123XYZ',

      salutation: string

      company: string    orderLineId: int        'tracking_number' => 'TRACK123456',

      firstName: string

      lastName: string    productId: int        'carrier' => 'DHL',

      street: string

      street2: string    productName: string        'status' => 'shipped',

      streetNumber: string

      zipcode: string    isTestOrder: bool        'shipped_at' => '2025-10-10 10:00:00',

      city: string

      state: string    quantityOrdered: int        'delivered_at' => null,

      country: string

      email: string    quantityDelivered: int        'recipient' => [

      phoneNo: string

      taxId: string    quantityOpen: int            'name' => 'John Doe',

      countryName: string

    tracking: array<DeliveryTrackingData>    priceCurrency: string            'street' => '123 Main St',

      deliveryId: int

      parcelServiceType: string    price: float            'zipcode' => '12345',

      serviceLabel: string

      trackingId: string    deliveredAt: ?DateTimeImmutable            'city' => 'Berlin',

      trackingUrl: string

      quantity: int    shippingPriceNet: ?float            'country' => 'DE'

      ipnConfigId: string

  isSetInProgress: bool    shippingPriceVat: ?float        ]

  setInProgressFailReason: ?string

```    shippingPriceGross: ?float    ]



## Usage Example    deliveryAddress: DeliveryAddressData]



```php      title: string```

use GoSuccess\Digistore24\Api\Digistore24;

use GoSuccess\Digistore24\Api\Client\Configuration;      salutation: string



// Initialize API client      company: string## Usage Example

$config = new Configuration('YOUR-API-KEY');

$api = new Digistore24($config);      firstName: string



// Get delivery details      lastName: string```php

$response = $api->delivery()->getDelivery(

    deliveryId: 3634      street: stringuse GoSuccess\Digistore24\Api\Digistore24;

);

      street2: stringuse GoSuccess\Digistore24\Api\Client\Configuration;

// Access delivery information

$delivery = $response->delivery;      zipcode: string

echo "Product: {$delivery->productName}\n";

echo "Purchase ID: {$delivery->purchaseId}\n";      city: string// Initialize API client

echo "Type: {$delivery->deliveryType}\n";

      state: string$config = new Configuration('YOUR-API-KEY');

// Access delivery address

$address = $delivery->deliveryAddress;      country: string$api = new Digistore24($config);

echo "Ship to: {$address->firstName} {$address->lastName}\n";

echo "City: {$address->city}, {$address->countryName}\n";      email: string



// Access tracking information      phone: string// Get delivery details

foreach ($delivery->tracking as $track) {

    echo "Service: {$track->serviceLabel}\n";      taxId: string$response = $api->delivery()->getDelivery(

    echo "Tracking ID: {$track->trackingId}\n";

    echo "URL: {$track->trackingUrl}\n";      countryName: string    deliveryId: 123

}

    tracking: array<DeliveryTrackingData>);

// Optionally set delivery status to "in progress"

$response = $api->delivery()->getDelivery(      deliveryId: int

    deliveryId: 3634,

    setInProgress: true      parcelServiceType: stringecho "Status: {$response->status}\n";

);

      serviceLabel: stringecho "Tracking: {$response->trackingNumber}\n";

if ($response->isSetInProgress) {

    echo "Delivery status updated to in progress\n";      trackingId: stringecho "Carrier: {$response->carrier}\n";

} else {

    echo "Failed: {$response->setInProgressFailReason}\n";      trackingUrl: string```

}

```      quantity: int



## Error Responses      ipnConfigId: ?int## Error Responses



| Code | Message | Description |    shippedAt: ?DateTimeImmutable

|------|---------|-------------|

| 404 | Delivery not found | Delivery ID does not exist |    deliveryStatus: string| Code | Message | Description |

| 403 | Access denied | Not authorized to access this delivery |

    deliveryNote: string|------|---------|-------------|

## Notes

  isSetInProgress: bool| 404 | Delivery not found | Delivery ID does not exist |

- Returns comprehensive delivery information including address, tracking, and product details

- The `set_in_progress` parameter automatically updates the delivery status  setInProgressFailReason: ?string| 403 | Access denied | Not authorized to access this delivery |

- Multiple tracking entries are supported (array of tracking data)

- Test orders are indicated by the `isTestOrder` flag```

- Timestamps are returned as DateTimeImmutable objects

## Notes

## Usage Example

- Returns comprehensive delivery information

```php- Status values: pending, shipped, in_transit, delivered, failed

use GoSuccess\Digistore24\Api\Digistore24;- Tracking numbers can be used with carrier websites

use GoSuccess\Digistore24\Api\Client\Configuration;- Use for customer service and order tracking


// Initialize API client
$config = new Configuration('YOUR-API-KEY');
$api = new Digistore24($config);

// Get delivery details
$response = $api->delivery()->getDelivery(
    deliveryId: 3634
);

// Access delivery information
$delivery = $response->delivery;
echo "Product: {$delivery->productName}\n";
echo "Purchase ID: {$delivery->purchaseId}\n";
echo "Status: {$delivery->deliveryStatus}\n";

// Access delivery address
$address = $delivery->deliveryAddress;
echo "Ship to: {$address->firstName} {$address->lastName}\n";
echo "City: {$address->city}, {$address->countryName}\n";

// Access tracking information
foreach ($delivery->tracking as $track) {
    echo "Service: {$track->serviceLabel}\n";
    echo "Tracking ID: {$track->trackingId}\n";
    echo "URL: {$track->trackingUrl}\n";
}

// Optionally set delivery status to "in progress"
$response = $api->delivery()->getDelivery(
    deliveryId: 3634,
    setInProgress: true
);

if ($response->isSetInProgress) {
    echo "Delivery status updated to in progress\n";
} else {
    echo "Failed: {$response->setInProgressFailReason}\n";
}
```

## Error Responses

| Code | Message | Description |
|------|---------|-------------|
| 404 | Delivery not found | Delivery ID does not exist |
| 403 | Access denied | Not authorized to access this delivery |

## Notes

- Returns comprehensive delivery information including address, tracking, and product details
- The `set_in_progress` parameter automatically updates the delivery status
- Multiple tracking entries are supported (array of tracking data)
- Test orders are indicated by the `isTestOrder` flag
- Quantities show ordered vs. delivered vs. open amounts
- Shipping prices include net, VAT, and gross amounts
- Timestamps are returned as DateTimeImmutable objects
