<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Enumerations\Global;

enum Reseller: int
{
    case DE = 1; // Digistore24 GmbH
    case US = 2; // Digistore24 Inc.
    case UK = 3; // Digistore24 LTD
    case IE = 4; // Digistore24 MSLW
}
