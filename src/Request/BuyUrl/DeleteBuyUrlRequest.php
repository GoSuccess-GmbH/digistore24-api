<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Delete Buy URL Request
 * 
 * Deletes a previously generated buy URL.
 * 
 * @link https://dev.digistore24.com/en/articles/28-deletebuyurl
 */
final readonly class DeleteBuyUrlRequest extends AbstractRequest
{
    /**
     * @param int $buyUrlId Buy URL ID to delete
     */
    public function __construct(
        public int $buyUrlId,
    ) {}

    public function endpoint(): string
    {
        return '/deleteBuyUrl';
    }

    public function toArray(): array
    {
        return [
            'buy_url_id' => $this->buyUrlId,
        ];
    }

    public function validate(): array
    {
        $errors = [];

        if ($this->buyUrlId <= 0) {
            $errors[] = 'Buy URL ID must be greater than 0';
        }

        return $errors;
    }
}
