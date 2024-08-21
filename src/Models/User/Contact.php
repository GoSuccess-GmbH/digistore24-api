<?php

namespace GoSuccess\Digistore24\Models\User;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class Contact extends Model
{
    public ?string $email = null;
    
    public ?string $first_name = null;
    
    public ?string $last_name = null;
    
    public ?string $title = null;
    
    public ?string $salutation = null;
    
    public ?string $company = null;
    
    public ?string $street = null;
    
    public ?string $street_number = null;
    
    public ?string $street2 = null;
    
    public ?string $city = null;
    
    public ?string $state = null;
    
    public ?string $zipcode = null;
    
    public ?string $country = null;
    
    public ?string $phone_no = null;
    
    public ?string $tax_id = null;
    
    public ?DateTime $modified_at = null;
    
    public ?string $support_email = null;
    
    public ?string $skypename = null;
}
