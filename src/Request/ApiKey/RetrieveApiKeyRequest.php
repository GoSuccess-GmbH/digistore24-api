<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ApiKey;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class RetrieveApiKeyRequest extends AbstractRequest
{
    public function __construct(private string $email, private string $token) {}
    public function endpoint(): string { return 'retrieveApiKey'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return ['email' => $this->email, 'token' => $this->token];
    }
}
