$files = @(
    "src/Resource/CommissionResource.php",
    "src/Resource/CustomFormResource.php",
    "src/Resource/FraudResource.php",
    "src/Resource/LicenseResource.php",
    "src/Resource/SystemResource.php",
    "src/Resource/TrackingResource.php"
)

$count = 0
foreach ($file in $files) {
    if (-not (Test-Path $file)) {
        Write-Host "SKIP: $file not found"
        continue
    }
    
    $content = Get-Content $file -Raw
    
    # Fix PHPDoc @throws namespace
    $content = $content -replace '@throws \\GoSuccess\\Digistore24\\Exception\\ApiException', '@throws \GoSuccess\Digistore24\Api\Exception\ApiException'
    
    Set-Content -Path $file -Value $content -NoNewline
    $count++
    Write-Host "Fixed PHPDoc in: $file"
}

Write-Host "`nFixed $count Resource files"
