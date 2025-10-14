<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Response from resending purchase confirmation mail
 *
 * @link https://digistore24.com/api/docs/paths/resendPurchaseConfirmationMail.yaml OpenAPI Specification
 */
final readonly class ResendPurchaseConfirmationMailResponse extends AbstractResponse
{
    public string $modified;
    public ?string $note;

    protected function parse(array $data): void
    {
        $this->modified = $data['data']['modified'];
        $this->note = $data['data']['note'] ?? null;
    }

    /**
     * Check if the email was successfully sent
     */
    public function wasSuccessful(): bool
    {
        return $this->modified === 'Y';
    }
}
