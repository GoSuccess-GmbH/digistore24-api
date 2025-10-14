<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\AccountAccess;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List Account Access Request
 *
 * Lists all logged member accesses for a specific purchase.
 * Provides history of when buyers accessed their membership content.
 */
final class ListAccountAccessRequest extends AbstractRequest
{
    public function __construct(
        public readonly string $purchaseId,
    ) {
    }

    public function endpoint(): string
    {
        return '/listAccountAccess';
    }

    public function toArray(): array
    {
        return [
            'purchase_id' => $this->purchaseId,
        ];
    }

    
}
