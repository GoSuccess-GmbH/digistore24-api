<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Request to list purchases by email address
 *
 * @link https://digistore24.com/api/docs/paths/listPurchasesOfEmail.yaml OpenAPI Specification
 */
final readonly class ListPurchasesOfEmailRequest extends AbstractRequest
{
    /**
     * @param string $email The buyer's email address
     * @param int $limit Maximum number of purchases to show (default: 100, minimum: 1)
     */
    public function __construct(
        public string $email,
        public int $limit = 100,
    ) {
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'limit' => $this->limit,
        ];
    }

    public function validate(): void
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email address format');
        }

        if ($this->limit < 1) {
            throw new \InvalidArgumentException('Limit must be at least 1');
        }
    }
}
