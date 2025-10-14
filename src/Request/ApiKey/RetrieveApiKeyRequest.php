<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ApiKey;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class RetrieveApiKeyRequest extends AbstractRequest
{
    public function __construct(private string $email, private string $token) {}
    public function getEndpoint(): string { return 'retrieveApiKey'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return ['email' => $this->email, 'token' => $this->token];
    }
}
