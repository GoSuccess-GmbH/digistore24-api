<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ConversionTool;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Validate Coupon Code Response
 *
 * Response object for the ConversionTool API endpoint.
 */
final class ValidateCouponCodeResponse extends AbstractResponse
{
    public function __construct(private string $status, private array $data)
    {
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function isValid(): bool
    {
        return $this->status === 'success';
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        $couponData = $data['data'] ?? [];

        return new self(
            status: (string)($couponData['status'] ?? ''),
            data: $couponData,
        );
    }
}
