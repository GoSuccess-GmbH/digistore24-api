<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\API;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\API\RequestStatus;

class RetrieveApiKeyResponse extends Model
{
    public ?string $api_key;
    
    public RequestStatus $request_status;
    
    public ?string $note = null;
}
