<?php

namespace GoSuccess\Digistore24\Models\Buyer;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class Buyer extends Model
{
    public ?string $salutation_msg = null;
    
    public ?string $street = null;
    
    public ?string $buyer_type = null;
    
    public ?int $id = null;
    
    public ?int $address_id = null;
    
    public ?string $street_name = null;
    
    public ?DateTime $created_at = null;
    
    public ?string $email = null;
    
    public ?string $first_name = null;
    
    public ?string $last_name = null;
    
    public ?string $salutation = null;
    
    public ?string $title = null;
    
    public ?string $company = null;
    
    public ?string $street_number = null;
    
    public ?string $street2 = null;
    
    public ?string $zipcode = null;
    
    public ?string $city = null;
    
    public ?string $state = null;
    
    public ?string $country = null;
    
    public ?string $phone_no = null;
}
