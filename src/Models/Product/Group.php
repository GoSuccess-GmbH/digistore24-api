<?php

namespace GoSuccess\Digistore24\Models\Product;

use GoSuccess\Digistore24\Abstracts\Model;

class Group extends Model
{
    public ?string $name = null;
    
    public ?int $position = null;
    
    public ?bool $is_shown_as_tab = null;
}
