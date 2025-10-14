<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List Buy URLs Request
 * 
 * Retrieves a paginated list of all generated buy URLs.
 * 
 * @link https://dev.digistore24.com/en/articles/64-listbuyurls
 */
final readonly class ListBuyUrlsRequest extends AbstractRequest
{
    /**
     * @param int $pageNo Page number (1-based)
     * @param int $pageSize Items per page (default: 100)
     */
    public function __construct(
        public int $pageNo = 1,
        public int $pageSize = 100,
    ) {}

    public function endpoint(): string
    {
        return '/listBuyUrls';
    }

    public function toArray(): array
    {
        return [
            'page_no' => $this->pageNo,
            'page_size' => $this->pageSize,
        ];
    }

    public function validate(): array
    {
        $errors = [];

        if ($this->pageNo < 1) {
            $errors[] = 'Page number must be at least 1';
        }

        if ($this->pageSize < 1 || $this->pageSize > 1000) {
            $errors[] = 'Page size must be between 1 and 1000';
        }

        return $errors;
    }
}
