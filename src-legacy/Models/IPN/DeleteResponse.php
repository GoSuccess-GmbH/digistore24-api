<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\IPN;

use GoSuccess\Digistore24\Abstracts\Model;

class DeleteResponse extends Model
{
    public ?bool $modified = null;
    
    public ?string $domain_id = null;
}
