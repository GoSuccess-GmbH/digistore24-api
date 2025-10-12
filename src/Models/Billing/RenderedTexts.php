<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Billing;

use GoSuccess\Digistore24\Abstracts\Model;

class RenderedTexts extends Model
{
    public ?string $headline = null;
    
    public ?string $description = null;

    public ?string $footnote = null;
}
