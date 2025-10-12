<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\API;

use GoSuccess\Digistore24\Abstracts\Model;

class DeleteApiKeyResponse extends Model
{
    public ?bool $modified = null;

    public ?string $note = null;
}
