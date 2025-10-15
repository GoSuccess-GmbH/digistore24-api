<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Transaction;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Transactions Request
 *
 * Retrieves a paginated and filterable list of transactions.
 */
final class ListTransactionsRequest extends AbstractRequest
{
    /**
     * @param string|null $from Start date for transactions (format: YYYY-MM-DD)
     * @param string|null $to End date for transactions (format: YYYY-MM-DD)
     * @param array|null $search Search criteria (buyer name, email, product, etc.)
     * @param string|null $sortBy Field to sort by
     * @param string|null $sortOrder Sort order ('asc' or 'desc')
     * @param int|null $pageNo Page number for pagination
     * @param int|null $pageSize Number of items per page
     */
    public function __construct(
        private ?string $from = null,
        private ?string $to = null,
        private ?array $search = null,
        private ?string $sortBy = null,
        private ?string $sortOrder = null,
        private ?int $pageNo = null,
        private ?int $pageSize = null,
    ) {}

    public function getEndpoint(): string { return 'listTransactions'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array
    {
        $params = [];
        if ($this->from !== null) $params['from'] = $this->from;
        if ($this->to !== null) $params['to'] = $this->to;
        if ($this->search !== null) $params['search'] = $this->search;
        if ($this->sortBy !== null) $params['sort_by'] = $this->sortBy;
        if ($this->sortOrder !== null) $params['sort_order'] = $this->sortOrder;
        if ($this->pageNo !== null) $params['page_no'] = $this->pageNo;
        if ($this->pageSize !== null) $params['page_size'] = $this->pageSize;
        return $params;
    }
}
