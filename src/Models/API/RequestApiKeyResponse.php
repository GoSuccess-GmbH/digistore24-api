<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\API;

use GoSuccess\Digistore24\Abstracts\Model;

class RequestApiKeyResponse extends Model
{
    public ?string $request_url;

    public ?string $request_token;
}
