<?php

namespace GoSuccess\Digistore24\Models\IPN;

use GoSuccess\Digistore24\Abstracts\Model;

class SetupResponse extends Model
{
    public ?bool $created = null;
    
    public ?bool $updated = null;
    
    public ?bool $deleted = null;
    
    public ?string $domain_id = null;
    
    public ?string $sha_passphrase = null;
    
    public ?int $ipn_config_id = null;
    
    public ?int $ipn_id = null;
}
