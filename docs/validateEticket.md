# validateEticket

Validates (scans) an e-ticket, marking it as used.

## Description

Marks an e-ticket as validated, which typically happens when a ticket is scanned at event check-in. This prevents the ticket from being used multiple times and tracks when the buyer entered the event. The endpoint will indicate if the ticket was already validated previously.

## Endpoint

`POST /validateEticket`

## Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `ticket_id` | string | Yes | The unique ticket ID to validate |

## Response

The response contains validation details and status information.

### Response Structure

```php
[
    'success' => true,
    'ticket_id' => 'TICKET123',
    'order_id' => 'ORDER456',
    'product_name' => 'Conference 2024',
    'buyer_name' => 'John Doe',
    'validated_at' => '2024-06-15 10:30:00',
    'was_already_validated' => false,
    'message' => 'Ticket validated successfully'
]
```

### Response Fields

| Field | Type | Description |
|-------|------|-------------|
| `success` | bool | Whether the validation was successful |
| `ticket_id` | string | The validated ticket ID |
| `order_id` | string | The order ID associated with the ticket |
| `product_name` | string | The name of the event |
| `buyer_name` | string | Full name of the ticket buyer |
| `validated_at` | string | Date and time when ticket was validated (ISO 8601 format) |
| `was_already_validated` | bool | Whether this ticket was already validated before |
| `message` | string\|null | Optional message (e.g., warnings or errors) |

## Example Usage

### Basic Ticket Validation

```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Eticket\ValidateEticketRequest;

$ds24 = new Digistore24('your-api-key');

$request = new ValidateEticketRequest(
    ticketId: 'TICKET123456'
);

try {
    $response = $ds24->eticket->validate($request);
    
    if ($response->success) {
        echo "✓ Access Granted\n\n";
        echo "Ticket ID: {$response->ticketId}\n";
        echo "Event: {$response->productName}\n";
        echo "Buyer: {$response->buyerName}\n";
        echo "Validated: {$response->validatedAt->format('Y-m-d H:i:s')}\n";
        
        if ($response->wasAlreadyValidated) {
            echo "\n⚠ Warning: This ticket was already scanned before!\n";
            echo "Message: {$response->message}\n";
        }
    } else {
        echo "✗ Access Denied\n";
        echo "Reason: {$response->message}\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

### Event Check-In System

```php
function checkInAttendee(string $ticketId): void
{
    $ds24 = new Digistore24('your-api-key');
    
    $request = new ValidateEticketRequest(ticketId: $ticketId);
    
    try {
        $response = $ds24->eticket->validate($request);
        
        if (!$response->success) {
            // Invalid ticket
            displayError("Invalid Ticket", $response->message);
            logCheckInAttempt($ticketId, 'FAILED', $response->message);
            return;
        }
        
        if ($response->wasAlreadyValidated) {
            // Already scanned - potential duplicate entry attempt
            displayWarning(
                "Duplicate Scan Detected",
                "This ticket was already used. Buyer: {$response->buyerName}"
            );
            logCheckInAttempt($ticketId, 'DUPLICATE', $response->buyerName);
            return;
        }
        
        // First-time valid scan
        displaySuccess(
            "Check-In Successful",
            "Welcome {$response->buyerName} to {$response->productName}!"
        );
        logCheckInAttempt($ticketId, 'SUCCESS', $response->buyerName);
        printBadge($response->buyerName, $response->productName);
        
    } catch (\Exception $e) {
        displayError("System Error", $e->getMessage());
        logCheckInAttempt($ticketId, 'ERROR', $e->getMessage());
    }
}
```

### QR Code Scanner Integration

```php
// Scan QR code and validate ticket
$scannedData = scanQrCode(); // Returns ticket ID from QR code

$request = new ValidateEticketRequest(
    ticketId: $scannedData
);

$response = $ds24->eticket->validate($request);

if ($response->success && !$response->wasAlreadyValidated) {
    // Grant access
    openGate();
    incrementAttendeeCount();
    
    echo "Welcome! Enjoy the event.\n";
} elseif ($response->wasAlreadyValidated) {
    // Duplicate scan
    soundAlarm();
    
    echo "This ticket has already been used.\n";
    echo "Please contact event staff.\n";
} else {
    // Invalid ticket
    soundAlarm();
    
    echo "Invalid ticket. Access denied.\n";
}
```

### Batch Validation with Error Handling

```php
$ticketIds = ['TICKET001', 'TICKET002', 'TICKET003'];

foreach ($ticketIds as $ticketId) {
    try {
        $request = new ValidateEticketRequest(ticketId: $ticketId);
        $response = $ds24->eticket->validate($request);
        
        $status = match(true) {
            !$response->success => "❌ Invalid",
            $response->wasAlreadyValidated => "⚠️  Already Used",
            default => "✓ Validated"
        };
        
        echo "{$ticketId}: {$status} - {$response->buyerName}\n";
        
    } catch (\Exception $e) {
        echo "{$ticketId}: ❌ Error - {$e->getMessage()}\n";
    }
}
```

## Use Cases

- **Event Check-In**: Scan tickets at venue entrance to grant access
- **Access Control**: Prevent duplicate entries by tracking validated tickets
- **Attendance Tracking**: Record who actually attended the event
- **Security**: Detect fraudulent or duplicate ticket usage
- **Staff Management**: Allow event staff to validate tickets via mobile app
- **Real-Time Monitoring**: Track check-in rates during event

## Important Notes

### Duplicate Validation
- If a ticket is scanned twice, `was_already_validated` will be `true`
- The ticket remains valid (`success = true`), but you should handle duplicates appropriately
- Consider your policy: allow re-entry, deny access, or alert security

### Validation Timestamp
- `validated_at` shows the current validation time
- For already-validated tickets, this shows the ORIGINAL validation time
- Use this to check how long ago a ticket was first scanned

### Security Considerations
- Always check both `success` AND `was_already_validated` flags
- Log all validation attempts for security auditing
- Consider implementing rate limiting for validation endpoints
- Alert staff for suspicious patterns (multiple failed attempts, etc.)

## Related Endpoints

- [createEticket](createEticket.md) - Create free e-tickets
- [getEticket](getEticket.md) - Get details of a specific e-ticket
- [listEtickets](listEtickets.md) - List all e-tickets
- [getEticketSettings](getEticketSettings.md) - Get e-ticket configuration
- [listEticketLocations](listEticketLocations.md) - List available locations
- [listEticketTemplates](listEticketTemplates.md) - List available templates

## Error Handling

```php
try {
    $response = $ds24->eticket->validate($request);
    
    // Check success status
    if (!$response->success) {
        // Handle invalid ticket
        handleInvalidTicket($response->message);
    }
    
    // Check for duplicate
    if ($response->wasAlreadyValidated) {
        // Handle already-used ticket
        handleDuplicateTicket($response);
    }
    
} catch (\GoSuccess\Digistore24\Api\Exception\NotFoundException $e) {
    // Ticket doesn't exist
    echo "Ticket not found";
} catch (\GoSuccess\Digistore24\Api\Exception\AuthenticationException $e) {
    // Invalid API key
    echo "Authentication failed";
} catch (\GoSuccess\Digistore24\Api\Exception\ApiException $e) {
    // Other API error
    echo "API error: " . $e->getMessage();
}
```

## Response Scenarios

### Successful First-Time Validation
```php
[
    'success' => true,
    'was_already_validated' => false,
    'message' => 'Ticket validated successfully'
]
```
**Action**: Grant access, welcome attendee

### Already Validated Ticket
```php
[
    'success' => true,
    'was_already_validated' => true,
    'message' => 'Warning: This ticket was already validated'
]
```
**Action**: Check your policy - allow re-entry or alert staff

### Invalid Ticket
```php
[
    'success' => false,
    'was_already_validated' => false,
    'message' => 'Ticket not found or invalid'
]
```
**Action**: Deny access, check for fraud

## Best Practices

1. **Always Log**: Keep records of all validation attempts
2. **Handle Duplicates**: Have a clear policy for already-validated tickets
3. **User Feedback**: Provide clear messages to attendees
4. **Staff Alerts**: Notify staff of suspicious activity
5. **Offline Mode**: Consider caching for network outages
6. **Testing**: Test your scanner system thoroughly before the event
7. **Backup**: Have a manual check-in process as backup

## Integration Examples

### Mobile Scanner App
```php
// Mobile app with camera scanner
$qrCodeData = $_POST['scanned_qr'];

$response = $ds24->eticket->validate(
    new ValidateEticketRequest(ticketId: $qrCodeData)
);

echo json_encode([
    'success' => $response->success,
    'allow_entry' => $response->success && !$response->wasAlreadyValidated,
    'buyer_name' => $response->buyerName,
    'event' => $response->productName,
    'warning' => $response->wasAlreadyValidated ? 'Duplicate scan' : null
]);
```

### Self-Service Kiosk
```php
// Attendee scans their own ticket at kiosk
$ticketId = getInputFromKiosk();

$response = $ds24->eticket->validate(
    new ValidateEticketRequest(ticketId: $ticketId)
);

if ($response->success && !$response->wasAlreadyValidated) {
    displayWelcomeScreen($response->buyerName);
    printBadge($response);
    openTurnstile();
} else {
    displayErrorScreen($response->message);
    callStaff();
}
```
