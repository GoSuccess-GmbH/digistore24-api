<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Invoice;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

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

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $resendData = $data['data'] ?? [];
        if (! is_array($resendData)) {
            $resendData = [];
        }

        $status = $resendData['status'] ?? '';
        $note = $resendData['note'] ?? '';

        return new self(
            status: is_string($status) ? $status : '',
            note: is_string($note) ? $note : '',
        );
    }
}
