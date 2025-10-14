<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Delete Buy URL Request
 * 
 * Deletes a previously generated buy URL.
 * 
 * @link https://digistore24.com/api/docs/paths/deleteBuyUrl.yaml
 */
final readonly class DeleteBuyUrlRequest extends AbstractRequest
{
    /**
     * @param int $id Buy URL ID to delete
     */
    public function __construct(
        public int $id,
    ) {}

    public function endpoint(): string
    {
        return '/deleteBuyUrl';
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }

    public function validate(): array
    {
        $errors = [];

        if ($this->id <= 0) {
            $errors[] = 'Buy URL ID must be greater than 0';
        }

        return $errors;
    }
}
