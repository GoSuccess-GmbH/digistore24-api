<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Affiliate;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ValidateAffiliateResponse extends AbstractResponse
{
    public function __construct(private bool $isValid, private array $data) {}
    public function isValid(): bool { return $this->isValid; }
    public function getData(): array { return $this->data; }
    public static function fromArray(array $data): self
    {
        return new self(
            isValid: (bool) ($data['data']['is_valid'] ?? false),
            data: $data['data'] ?? []
        );
    }
}
