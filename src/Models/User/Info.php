<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\User;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Attributes\ArrayItemType;

class Info extends Model
{
    public ?int $user_id = null;
    
    public ?string $user_name = null;
    
    #[ArrayItemType(type: 'enum', object: 'GoSuccess\Digistore24\Enumerations\Global\GrantedRole')]
    public ?array $granted_roles = null;
    
    public ?array $granted_roles_msg = null;
    
    public ?int $api_key_id = null;
    
    public ?string $api_key_site_url = null;
    
    public ?string $api_key_permissions = null;
    
    #[ArrayItemType(type: 'enum', object: 'GoSuccess\Digistore24\Enumerations\Global\Reseller')]
    public ?array $reseller_ids = null;
    
    public ?string $thankyou_page_key = null;
    
    public ?DateTime $modified_at = null;
    
    public ?Contact $contact = null;
}
