<?php

namespace GoSuccess\Digistore24\Enumerations\IPN;

enum Timing: string
{
    case BeforeThankYou = 'before_thankyou';
    case Delayed = 'delayed';
}
