<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Delete Buy URL Response
 *
 * Confirms deletion of a buy URL.
 */
final class DeleteBuyUrlResponse extends AbstractResponse
{
    /**
     * @param bool $success Whether deletion was successful
     */
    public function __construct(
        public bool $success = true,
    ) {
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        // Successful response (200) means deletion was successful
        return new self(success: true);
    }
}
