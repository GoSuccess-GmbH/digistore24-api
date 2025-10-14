$files = Get-ChildItem -Path "src/Response" -Filter "*.php" -Recurse | Where-Object {
    $_.Name -notlike "*Abstract*"
}

$count = 0
foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Skip if already has PHPDoc comment
    if ($content -match "/\*\*\r?\n \*.*\r?\n \*/") {
        continue
    }
    
    # Extract class name and category
    $className = $file.BaseName
    $category = $file.Directory.Name
    
    # Generate description based on class name
    $description = $className -replace "Response$", "" -creplace "([A-Z])", " `$1"
    $description = $description.Trim()
    
    # Read content
    $lines = Get-Content $file.FullName
    $newContent = @()
    
    for ($i = 0; $i -lt $lines.Length; $i++) {
        $line = $lines[$i]
        
        # Insert PHPDoc before "final readonly class" line
        if ($line -match "^final readonly class") {
            $newContent += "/**"
            $newContent += " * $description Response"
            $newContent += " *"
            $newContent += " * Response object for the $category API endpoint."
            $newContent += " */"
        }
        
        $newContent += $line
    }
    
    $newContent -join "`r`n" | Set-Content $file.FullName -NoNewline
    $count++
    Write-Host "Added PHPDoc: $($file.FullName)"
}

Write-Host "`nAdded PHPDoc to $count files"
