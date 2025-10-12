<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\API;

use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Enumerations\API\Permission;

class RequestApiKeyRequest extends Model
{
    public Permission $permissions;

    public ?string $return_url;

    public ?string $cancel_url = null;

    public ?string $site_url = null;

    public ?string $comment = null;
}
