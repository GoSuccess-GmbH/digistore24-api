<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Eticket;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Get E-Ticket Request
 *
 * Retrieves details of a specific e-ticket by its order ID.
 */
final class GetEticketRequest extends AbstractRequest
{
    public function __construct(
        public readonly string $orderId,
    ) {
    }

    public function getEndpoint(): string
    {
        return 'getEticket';
    }

    public function toArray(): array
    {
        return [
            'order_id' => $this->orderId,
        ];
    }

    
}
