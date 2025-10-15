<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Create Buy URL Response
 * 
 * Response object for createBuyUrl endpoint.
 * Uses PHP 8.4 property hooks for automatic type conversion.
 * 
 * @link https://digistore24.com/api/docs/paths/createBuyUrl.yaml
 */
final class CreateBuyUrlResponse extends AbstractResponse
{
    public ?string $id = null;
    public ?string $url = null;
    public ?\DateTimeImmutable $validUntil = null;
    public ?string $upgradeStatus = null;

    /**
     * Create response from array data
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $response = new self();
        $response->id = self::getValue($data, 'id', 'string');
        $response->url = self::getValue($data, 'url', 'string');
        $response->validUntil = self::getValue($data, 'valid_until', 'datetime_immutable');
        $response->upgradeStatus = self::getValue($data, 'upgrade_status', 'string');

        return $response;
    }
}
