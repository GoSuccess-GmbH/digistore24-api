<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\PaymentPlan;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class UpdatePaymentplanResponse extends AbstractResponse
{
    public function __construct(private string $result) {}
    public function getResult(): string { return $this->result; }
    public function wasSuccessful(): bool { return $this->result === 'success'; }
    public static function fromArray(array $data): self
    {
        return new self(result: (string) ($data['result'] ?? ''));
    }
}
