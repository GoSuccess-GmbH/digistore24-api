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
    case ORDERS = 'orders';
    case AFFILIATIONS = 'affiliations';
    case ETICKETS = 'etickets';
    case CUSTOMFORMS = 'customforms';
    case ORDERFORM = 'orderform';
}
