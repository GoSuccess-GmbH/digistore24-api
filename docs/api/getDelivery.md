# getDelivery# getDelivery



Get details of a specific delivery.Get details of a specific delivery.



## Endpoint## Endpoint



``````

GET /json/getDeliveryPOST /json/getDelivery

``````



## Request Parameters## Request Parameters



| Parameter | Type | Required | Description || Parameter | Type | Required | Description |

|-----------|------|----------|-------------||-----------|------|----------|-------------|

| `delivery_id` | int | Yes | Delivery ID || `delivery_id` | int | Yes | Delivery ID |

| `set_in_progress` | bool | No | Set delivery status to "in progress" (default: false) |

## Response

## Response Structure (PHP)

```php

```php[

GoSuccess\Digistore24\Api\Response\Delivery\GetDeliveryResponse:    'result' => 'success',

  delivery: DeliveryDetailsData    'data' => [

    id: int        'delivery_id' => 123,

    purchaseId: string        'purchase_id' => 'ABC123XYZ',

    orderLineId: int        'tracking_number' => 'TRACK123456',

    productId: int        'carrier' => 'DHL',

    productName: string        'status' => 'shipped',

    isTestOrder: bool        'shipped_at' => '2025-10-10 10:00:00',

    quantityOrdered: int        'delivered_at' => null,

    quantityDelivered: int        'recipient' => [

    quantityOpen: int            'name' => 'John Doe',

    priceCurrency: string            'street' => '123 Main St',

    price: float            'zipcode' => '12345',

    deliveredAt: ?DateTimeImmutable            'city' => 'Berlin',

    shippingPriceNet: ?float            'country' => 'DE'

    shippingPriceVat: ?float        ]

    shippingPriceGross: ?float    ]

    deliveryAddress: DeliveryAddressData]

      title: string```

      salutation: string

      company: string## Usage Example

      firstName: string

      lastName: string```php

      street: stringuse GoSuccess\Digistore24\Api\Digistore24;

      street2: stringuse GoSuccess\Digistore24\Api\Client\Configuration;

      zipcode: string

      city: string// Initialize API client

      state: string$config = new Configuration('YOUR-API-KEY');

      country: string$api = new Digistore24($config);

      email: string

      phone: string// Get delivery details

      taxId: string$response = $api->delivery()->getDelivery(

      countryName: string    deliveryId: 123

    tracking: array<DeliveryTrackingData>);

      deliveryId: int

      parcelServiceType: stringecho "Status: {$response->status}\n";

      serviceLabel: stringecho "Tracking: {$response->trackingNumber}\n";

      trackingId: stringecho "Carrier: {$response->carrier}\n";

      trackingUrl: string```

      quantity: int

      ipnConfigId: ?int## Error Responses

    shippedAt: ?DateTimeImmutable

    deliveryStatus: string| Code | Message | Description |

    deliveryNote: string|------|---------|-------------|

  isSetInProgress: bool| 404 | Delivery not found | Delivery ID does not exist |

  setInProgressFailReason: ?string| 403 | Access denied | Not authorized to access this delivery |

```

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
