<?php

namespace GoSuccess\Digistore24\Enumerations\Global;

enum GrantedRole: string
{
    case User = 'user';
    case Affiliate = 'affiliate';
    case Vendor = 'vendor';
    case Operator = 'operator';
    case Admin = 'admin';
    case Merchant = 'merchant';
}
