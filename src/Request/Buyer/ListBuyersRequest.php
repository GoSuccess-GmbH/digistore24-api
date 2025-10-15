<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Buyer;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Buyers Request
 *
 * Retrieves a paginated list of all buyers.
 */
final class ListBuyersRequest extends AbstractRequest
{
    /**
     * @param int|null $pageNo Page number (starts at 1)
     * @param int|null $pageSize Number of items per page
     */
    public function __construct(
        private ?int $pageNo = null,
        private ?int $pageSize = null,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/listBuyers';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        $params = [];
        if ($this->pageNo !== null) {
            $params['page_no'] = $this->pageNo;
        }
        if ($this->pageSize !== null) {
            $params['page_size'] = $this->pageSize;
        }
        return $params;
    }
}
