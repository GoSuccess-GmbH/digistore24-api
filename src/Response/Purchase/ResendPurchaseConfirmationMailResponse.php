<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Resend Purchase Confirmation Mail Response
 *
 * Response object for the Purchase API endpoint.
 */
final readonly class ResendPurchaseConfirmationMailResponse extends AbstractResponse
{
    public function __construct(private string $modified, private ?string $note)
    {
    }

    public function getModified(): string
    {
        return $this->modified;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function wasSuccessful(): bool
    {
        return $this->modified === 'Y';
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            modified: (string) ($data['data']['modified'] ?? 'N'),
            note: $data['data']['note'] ?? null
        );
    }
}
