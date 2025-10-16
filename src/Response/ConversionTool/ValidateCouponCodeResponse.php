<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ConversionTool;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Validate Coupon Code Response
 *
 * Response object for the ConversionTool API endpoint.
 */
final class ValidateCouponCodeResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(private string $status, private array $data)
    {
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function isValid(): bool
    {
        return $this->status === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $couponData = $data['data'] ?? [];
        
        if (!is_array($couponData)) {
            $couponData = [];
        }
        
        /** @var array<string, mixed> $validatedCouponData */
        $validatedCouponData = $couponData;
        
        $status = $validatedCouponData['status'] ?? '';

        return new self(
            status: is_string($status) ? $status : '',
            data: $validatedCouponData,
        );
    }
}
