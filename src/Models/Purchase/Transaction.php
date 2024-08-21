<?php

namespace GoSuccess\Digistore24\Models\Purchase;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Model;

class Transaction extends Model
{
    public ?string $invoice_url = null;
    
    public ?int $id = null;
    
    public ?float $amount = null;
    
    public ?string $currency = null;
    
    public ?string $purchase_id = null;
    
    public ?string $pay_method = null;
    
    public ?string $pay_method_msg = null;
    
    public ?DateTime $created_at = null;
    
    public ?int $pay_sequence_no = null;
    
    public ?DateTime $pay_date = null;
    
    public ?int $parent_txn_id = null;
    
    public ?string $type = null;
    
    public ?string $type_msg = null;
    
    public TransactionRefundInfo $refund_info;
}
