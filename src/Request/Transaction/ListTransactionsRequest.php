<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Transaction;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class ListTransactionsRequest extends AbstractRequest
{
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
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
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
