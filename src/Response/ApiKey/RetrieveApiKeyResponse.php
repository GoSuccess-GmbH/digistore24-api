<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\ApiKey;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class RetrieveApiKeyResponse extends AbstractResponse
{
    public function __construct(private string $apiKey) {}
    public function getApiKey(): string { return $this->apiKey; }
    public static function fromArray(array $data): self
    {
        return new self(apiKey: (string) ($data['data']['api_key'] ?? ''));
    }
}
