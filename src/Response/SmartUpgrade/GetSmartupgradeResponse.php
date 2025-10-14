<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\SmartUpgrade;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class GetSmartupgradeResponse extends AbstractResponse
{
    public function __construct(private array $data)
    {
    }
    public function getData(): array
    {
        return $this->data;
    }
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(data: $data['data'] ?? []);
    }
}
