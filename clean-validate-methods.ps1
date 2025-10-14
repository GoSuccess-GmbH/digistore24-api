$files = @(
    "src/Request/Product/CreateProductRequest.php",
    "src/Request/Product/CopyProductRequest.php",
    "src/Request/Product/UpdateProductRequest.php",
    "src/Request/Purchase/ListPurchasesOfEmailRequest.php",
    "src/Request/Purchase/GetPurchaseTrackingRequest.php",
    "src/Request/Purchase/CreateUpgradePurchaseRequest.php",
    "src/Request/Purchase/AddBalanceToPurchaseRequest.php",
    "src/Request/Purchase/UpdatePurchaseRequest.php",
    "src/Request/Purchase/RefundPurchaseRequest.php",
    "src/Request/Purchase/ResendPurchaseConfirmationMailRequest.php",
    "src/Request/Purchase/GetPurchaseDownloadsRequest.php",
    "src/Request/Purchase/GetCustomerToAffiliateBuyerDetailsRequest.php"
)

$count = 0
foreach ($file in $files) {
    if (-not (Test-Path $file)) {
        Write-Host "SKIP: $file not found"
        continue
    }
    
    $content = Get-Content $file -Raw
    
    # Remove entire validate method and its body (anything after the closing } of toArray until the class closing })
    $content = $content -replace '(?s)(public function toArray\(\): array\s*\{[^\}]*\})\s*public function validate\(\):[^\{]*\{[^\}]*\}', '$1'
    
    # Also remove orphaned validate body if method signature was already removed
    $content = $content -replace '(?s)(public function (toArray|endpoint)\(\):[^\}]*\}\s*)\s*if \(\$this->[^\}]*\}(\s*\})', '$1$3'
    
    Set-Content -Path $file -Value $content -NoNewline
    $count++
    Write-Host "Cleaned: $file"
}

Write-Host "`nCleaned $count files"
