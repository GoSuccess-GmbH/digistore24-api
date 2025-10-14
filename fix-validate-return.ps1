$files = Get-ChildItem -Path "src/Request" -Filter "*.php" -Recurse

$count = 0
foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Fix validate() methods that don't return array
    if ($content -match "public function validate\(\): array\s*\{[^\}]*\}\s*(?!\s*return)") {
        # Find validate methods without return statement
        $content = $content -replace "(public function validate\(\): array\s*\{)([^\}]*?)(\})", {
            param($match)
            $body = $match.Groups[2].Value.Trim()
            if ($body -eq "" -or $body -notmatch "return") {
                return $match.Groups[1].Value + "`n        return [];`n    " + $match.Groups[3].Value
            }
            return $match.Value
        }
        
        Set-Content -Path $file.FullName -Value $content -NoNewline
        $count++
        Write-Host "Fixed validate() return in: $($file.Name)"
    }
}

Write-Host "`nFixed $count files"
