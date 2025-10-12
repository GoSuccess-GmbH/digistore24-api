<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Product;

use GoSuccess\Digistore24\Abstracts\Model;
use DateTime;

class ApprovalStatus extends Model
{
    public ?int $reseller_id = null;
    
    public ?string $reseller_name = null;
    
    public ?string $approval_status = null;
    
    public ?string $approval_status_msg = null;
    
    public ?bool $is_siteowner_active = null;
    
    public ?DateTime $modified_at = null;
    
    public ?array $approval_reject_reason = null;
    
    public ?string $approval_reject_reason_msg = null;
    
    public ?string $approval_reject_reason_description = null;
}
