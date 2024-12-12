<?php

namespace GoSuccess\Digistore24\Enumerations\API;

enum Permission: string
{
    case ReadOnly = 'read-only';
    case Writable = 'writable';
}
