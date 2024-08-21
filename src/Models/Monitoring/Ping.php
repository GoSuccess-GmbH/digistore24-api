<?php

namespace GoSuccess\Digistore24\Models\Monitoring;

use GoSuccess\Digistore24\Abstracts\Model;
use DateTime;

class Ping extends Model
{
    public ?DateTime $server_time = null;
}
