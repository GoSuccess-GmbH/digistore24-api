<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Buyer;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class UpdateBuyerRequest extends AbstractRequest
{
    public function __construct(
        private string $buyerId,
        private ?string $email = null,
        private ?string $firstName = null,
        private ?string $lastName = null,
        private ?array $address = null,
    ) {}
    public function getEndpoint(): string { return 'updateBuyer'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        $params = ['buyer_id' => $this->buyerId];
        if ($this->email !== null) $params['email'] = $this->email;
        if ($this->firstName !== null) $params['first_name'] = $this->firstName;
        if ($this->lastName !== null) $params['last_name'] = $this->lastName;
        if ($this->address !== null) $params['address'] = $this->address;
        return $params;
    }
}
