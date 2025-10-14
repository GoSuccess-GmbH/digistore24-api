<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ApiKey;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class RequestApiKeyRequest extends AbstractRequest
{
    public function __construct(private string $email) {}
    public function getEndpoint(): string { return 'requestApiKey'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return ['email' => $this->email]; }
}
