<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * IPN Transaction Category
 *
 * Categories of transactions that can trigger IPN notifications.
 */
enum IpnTransactionCategory: string
{
    case Orders = 'orders';
    case Affiliations = 'affiliations';
    case Etickets = 'etickets';
    case Customforms = 'customforms';
    case Orderform = 'orderform';
}
