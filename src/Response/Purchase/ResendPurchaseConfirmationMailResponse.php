<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Resend Purchase Confirmation Mail Response
 *
 * Response object for the Purchase API endpoint.
 */
final class ResendPurchaseConfirmationMailResponse extends AbstractResponse
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

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $modified = $innerData['modified'] ?? 'N';
        $note = $innerData['note'] ?? null;

        return new self(
            modified: is_string($modified) ? $modified : 'N',
            note: $note !== null && is_string($note) ? $note : null,
        );
    }
}
