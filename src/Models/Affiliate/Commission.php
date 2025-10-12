<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Affiliate;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Attributes\ArrayItemType;

class Commission extends Model
{
    #[ArrayItemType(type: 'class', object: 'GoSuccess\Digistore24\Models\Affiliate\Affiliation')]
    public ?array $affiliations = null;
    
    public ?int $affiliate_id = null;

    public ?string $affiliate_name = null;
}
