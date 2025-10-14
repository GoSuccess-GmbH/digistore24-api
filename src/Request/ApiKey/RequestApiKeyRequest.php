<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ApiKey;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class RequestApiKeyRequest extends AbstractRequest
{
    public function __construct(private string $email) {}
    public function endpoint(): string { return 'requestApiKey'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return ['email' => $this->email]; }
}
