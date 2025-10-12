<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Models\Country;
use GoSuccess\Digistore24\Abstracts\Model;

class Country extends Model
{
    public ?string $code = null;

    public ?string $name = null;
}
