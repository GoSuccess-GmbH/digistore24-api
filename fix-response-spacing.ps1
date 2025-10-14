$files = Get-ChildItem -Path "src/Response" -Filter "*.php" -Recurse | Where-Object {
    $_.Name -notlike "*Abstract*"
}

$count = 0
foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Skip if already has proper formatting (contains empty line after declare)
    if ($content -match "declare\(strict_types=1\);\r?\n\r?\n") {
        continue
    }
    
    $lines = Get-Content $file.FullName
    $newContent = @()
    
    for ($i = 0; $i -lt $lines.Length; $i++) {
        $line = $lines[$i]
        $newContent += $line
        
        # Add empty line after <?php
        if ($line -eq "<?php" -and $i + 1 -lt $lines.Length -and $lines[$i + 1] -eq "declare(strict_types=1);") {
            $newContent += ""
        }
        # Add empty line after declare
        elseif ($line -eq "declare(strict_types=1);" -and $i + 1 -lt $lines.Length -and $lines[$i + 1] -match "^namespace ") {
            $newContent += ""
        }
        # Add empty line after namespace
        elseif ($line -match "^namespace " -and $i + 1 -lt $lines.Length -and $lines[$i + 1] -match "^use ") {
            $newContent += ""
        }
        # Add empty line after last use statement (before class definition)
        elseif ($line -match "^use " -and $i + 1 -lt $lines.Length -and $lines[$i + 1] -match "^(final |class |/\*\*)") {
            $newContent += ""
        }
        # Add empty line after closing brace of constructor (before getter)
        elseif ($line -match "^\s+\}\s*$" -and $i + 1 -lt $lines.Length -and $lines[$i + 1] -match "^\s+public function get") {
            $newContent += ""
        }
        # Add empty line after closing brace of getter (before fromArray or another method)
        elseif ($line -match "^\s+\}\s*$" -and $i + 1 -lt $lines.Length -and $lines[$i + 1] -match "^\s+public (static function fromArray|function \w+)") {
            $newContent += ""
        }
    }
    
    $newContent -join "`r`n" | Set-Content $file.FullName -NoNewline
    $count++
    Write-Host "Fixed spacing: $($file.FullName)"
}

Write-Host "`nFixed spacing in $count files"
