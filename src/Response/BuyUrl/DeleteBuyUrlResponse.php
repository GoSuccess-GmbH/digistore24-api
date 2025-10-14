<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Delete Buy URL Response
 * 
 * Confirms deletion of a buy URL.
 */
final readonly class DeleteBuyUrlResponse extends AbstractResponse
{
    /**
     * @param bool $success Whether deletion was successful
     * @param string|null $message Optional message
     */
    public function __construct(
        public bool $success = false,
        public ?string $message = null,
    ) {}

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            success: TypeConverter::toBool($data['success'] ?? null) ?? true,
            message: isset($data['message']) ? (string) $data['message'] : null,
        );
    }
}
