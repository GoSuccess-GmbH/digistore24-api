<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\IPN;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\IPN\Timing;
use GoSuccess\Digistore24\Enumerations\IPN\NewsletterSendPolicy;

class Settings extends Model
{
    public ?NewsletterSendPolicy $newsletter_send_policy = null;
    
    public ?string $name = null;
    
    public ?string $domain_id = null;
    
    public ?array $product_ids = null;
    
    public ?string $ipn_url = null;
    
    public ?array $categories = null;
    
    public ?array $transactions = null;
    
    public ?Timing $timing = null;
    
    public ?string $sha_passphrase = null;
}
