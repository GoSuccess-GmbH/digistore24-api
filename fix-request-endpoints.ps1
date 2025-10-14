# Einfaches Script: Finde die toArray-Methode, lösche alles danach, füge endpoint() hinzu

$endpoints = @{
    "CopyProductRequest" = "/copyProduct"
    "UpdateProductRequest" = "/updateProduct"
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

foreach ($className in $endpoints.Keys) {
    $file = Get-ChildItem -Path "src/Request" -Filter "$className.php" -Recurse | Select-Object -First 1
    
    if (-not $file) {
        Write-Host "SKIP: $className not found"
        continue
    }
    
    $lines = Get-Content $file.FullName
    $newContent = @()
    $inToArrayMethod = $false
    $foundToArrayEnd = $false
    
    for ($i = 0; $i -lt $lines.Length; $i++) {
        $line = $lines[$i]
        
        # Track if we're in toArray method
        if ($line -match '^\s*public function toArray\(\)') {
            $inToArrayMethod = $true
        }
        
        # If we find the closing } of toArray and we're in it
        if ($inToArrayMethod -and $line -match '^\s*\}$' -and -not $foundToArrayEnd) {
            $newContent += $line
            $foundToArrayEnd = $true
            
            # Add endpoint method
            $newContent += ""
            $newContent += "    public function endpoint(): string"
            $newContent += "    {"
            $newContent += "        return '$($endpoints[$className])';"
            $newContent += "    }"
            
            # Skip everything until class closing brace
            for ($j = $i + 1; $j -lt $lines.Length; $j++) {
                if ($lines[$j] -match '^\}$') {
                    $newContent += $lines[$j]
                    break
                }
            }
            break
        }
        
        $newContent += $line
    }
    
    $newContent -join "`r`n" | Set-Content $file.FullName -NoNewline
    Write-Host "Fixed: $className"
}

Write-Host "`nDone"
