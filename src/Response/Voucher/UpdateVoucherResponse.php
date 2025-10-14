<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Voucher;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class UpdateVoucherResponse extends AbstractResponse
{
    public function __construct(private string $result)
    {
    }
    public function getResult(): string
    {
        return $this->result;
    }
    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(result: (string) ($data['result'] ?? ''));
    }
}
