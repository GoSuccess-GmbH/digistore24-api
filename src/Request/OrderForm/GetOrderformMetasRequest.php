<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Get Order Form Metas Request
 *
 * Retrieves metadata and available options for order form configuration.
 */
final class GetOrderformMetasRequest extends AbstractRequest
{
    public function __construct()
    {
    }

    public function getEndpoint(): string
    {
        return '/getOrderformMetas';
    }

    public function method(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return [];
    }
}
