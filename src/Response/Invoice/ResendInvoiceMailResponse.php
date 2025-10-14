<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Invoice;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Resend Invoice Mail Response
 *
 * Response object for the Invoice API endpoint.
 */
final class ResendInvoiceMailResponse extends AbstractResponse
{
    public function __construct(private string $status, private string $note)
    {
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function wasSuccessful(): bool
    {
        return $this->status === 'success';
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        $resendData = $data['data'] ?? [];
        return new self(
            status: (string) ($resendData['status'] ?? ''),
            note: (string) ($resendData['note'] ?? '')
        );
    }
}