# Find all PHP files with wrong namespace
$files = Get-ChildItem -Path "src" -Filter "*.php" -Recurse | Where-Object {
    $content = Get-Content $_.FullName -Raw
    $content -match "namespace Digistore24\\"
}

Write-Host "Found $($files.Count) files with wrong namespace"

$count = 0
foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Fix namespace: Digistore24\ -> GoSuccess\Digistore24\Api\
    $content = $content -replace "namespace Digistore24\\", "namespace GoSuccess\Digistore24\Api\"
    
    # Fix use statements: Digistore24\ -> GoSuccess\Digistore24\Api\
    $content = $content -replace "use Digistore24\\", "use GoSuccess\Digistore24\Api\"
    
    $content | Set-Content $file.FullName -NoNewline
    $count++
    Write-Host "Fixed: $($file.FullName)"
}

Write-Host "`nFixed $count files"
