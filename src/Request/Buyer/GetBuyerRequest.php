<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Buyer;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetBuyerRequest extends AbstractRequest
{
    public function __construct(private string $buyerId) {}
    public function getEndpoint(): string { return 'getBuyer'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['buyer_id' => $this->buyerId]; }
}
