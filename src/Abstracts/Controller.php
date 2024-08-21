<?php

namespace GoSuccess\Digistore24\Abstracts;

use GoSuccess\Digistore24\API;

abstract class Controller
{
    protected API $api;

    public function __construct( API $api )
    {
        $this->api = $api;
    }
}
