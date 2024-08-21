<?php

namespace GoSuccess\Digistore24\Models\IPN;

use GoSuccess\Digistore24\Abstracts\Model;

class IPN extends Model
{
    public ?bool $have_settings = null;
    
    public ?Settings $ipn_settings = null;
}
