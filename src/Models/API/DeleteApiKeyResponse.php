<?php

namespace GoSuccess\Digistore24\Models\API;

use GoSuccess\Digistore24\Abstracts\Model;

class DeleteApiKeyResponse extends Model
{
    public ?bool $modified = null;

    public ?string $note = null;
}
