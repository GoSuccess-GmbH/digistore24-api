<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Buyer;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class ListBuyersRequest extends AbstractRequest
{
    public function __construct(
        private ?int $pageNo = null,
        private ?int $pageSize = null,
    ) {}
    public function getEndpoint(): string { return 'listBuyers'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array
    {
        $params = [];
        if ($this->pageNo !== null) $params['page_no'] = $this->pageNo;
        if ($this->pageSize !== null) $params['page_size'] = $this->pageSize;
        return $params;
    }
}
