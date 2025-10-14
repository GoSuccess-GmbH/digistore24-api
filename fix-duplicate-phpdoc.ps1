$files = Get-ChildItem -Path "src/Response" -Filter "*.php" -Recurse | Where-Object {
    $_.Name -notlike "*Abstract*"
}

$count = 0
foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Check for duplicate PHPDoc (appears twice in a row)
    if ($content -match "(/\*\*[^*]*\*/)\s*(\1)") {
        Write-Host "Found duplicate PHPDoc in: $($file.Name)"
        
        # Remove duplicate by replacing the double occurrence with single
        $content = $content -replace "(/\*\*\r?\n \* [^\*]+\r?\n \*\r?\n \* [^\*]+\r?\n \*/)\r?\n(\1)", '$1'
        
        $content | Set-Content $file.FullName -NoNewline
        $count++
    }
}

Write-Host "`nFixed duplicate PHPDoc in $count files"
