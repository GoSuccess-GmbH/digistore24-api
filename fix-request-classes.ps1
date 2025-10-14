# Finde alle Request-Dateien die "validate(): void" enthalten
$files = @(
    "src/Request/Product/CreateProductRequest.php",
    "src/Request/Product/CopyProductRequest.php",
    "src/Request/Product/UpdateProductRequest.php",
    "src/Request/Product/DeleteProductRequest.php",
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

$endpoints = @{
    "CreateProductRequest" = "/createProduct"
    "CopyProductRequest" = "/copyProduct"
    "UpdateProductRequest" = "/updateProduct"
    "DeleteProductRequest" = "/deleteProduct"
    "ListPurchasesOfEmailRequest" = "/listPurchasesOfEmail"
    "GetPurchaseTrackingRequest" = "/getPurchaseTracking"
    "CreateUpgradePurchaseRequest" = "/createUpgradePurchase"
    "AddBalanceToPurchaseRequest" = "/addBalanceToPurchase"
    "UpdatePurchaseRequest" = "/updatePurchase"
    "RefundPurchaseRequest" = "/refundPurchase"
    "ResendPurchaseConfirmationMailRequest" = "/resendPurchaseConfirmationMail"
    "GetPurchaseDownloadsRequest" = "/getPurchaseDownloads"
    "GetCustomerToAffiliateBuyerDetailsRequest" = "/getCustomerToAffiliateBuyerDetails"
}

$count = 0
foreach ($file in $files) {
    if (-not (Test-Path $file)) {
        Write-Host "SKIP: File not found: $file"
        continue
    }
    
    $content = Get-Content $file -Raw
    $className = [System.IO.Path]::GetFileNameWithoutExtension($file)
    $endpointPath = $endpoints[$className]
    
    # 1. Fix validate(): void -> validate(): array
    if ($content -match "public function validate\(\): void") {
        $content = $content -replace "public function validate\(\): void", "public function validate(): array"
        Write-Host "Fixed validate() signature in: $className"
    }
    
    # 2. Add endpoint() method if missing
    if ($content -notmatch "public function endpoint\(\): string") {
        # Find position to insert (after toArray method)
        if ($content -match "(?s)(public function toArray\(\): array\s*\{[^\}]*\}\s*\n)(\s*public function validate)") {
            $endpointMethod = "`n    public function endpoint(): string`n    {`n        return '$endpointPath';`n    }`n"
            $content = $content -replace "(?s)(public function toArray\(\): array\s*\{[^\}]*\}\s*\n)(\s*public function validate)", "`$1$endpointMethod`n`$2"
            Write-Host "Added endpoint() method to: $className"
        }
    }
    
    # 3. Change "final readonly class" to "final class" if needed
    if ($content -match "final readonly class") {
        $content = $content -replace "final readonly class", "final class"
        Write-Host "Changed to non-readonly class: $className"
    }
    
    # 4. Remove "readonly" from constructor parameters
    $content = $content -replace "public readonly ", "public "
    
    Set-Content -Path $file -Value $content -NoNewline
    $count++
}

Write-Host "`nProcessed $count Request files"
