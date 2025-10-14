<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Buyer;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class GetBuyerRequest extends AbstractRequest
{
    public function __construct(private string $buyerId) {}
    public function getEndpoint(): string { return 'getBuyer'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['buyer_id' => $this->buyerId]; }
}
