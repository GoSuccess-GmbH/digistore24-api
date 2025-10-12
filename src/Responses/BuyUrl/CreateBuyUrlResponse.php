<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Responses\BuyUrl;

use GoSuccess\Digistore24\Contracts\AbstractResponse;
use GoSuccess\Digistore24\Http\Response;

/**
 * Create Buy URL Response
 * 
 * Response object for created buy URL.
 * Uses PHP 8.4 readonly properties and property hooks.
 */
readonly class CreateBuyUrlResponse extends AbstractResponse
{
    public string $id;
    public string $url;
    public ?\DateTimeImmutable $validUntil;
    public string $upgradeStatus;

    private function __construct(
        string $id,
        string $url,
        ?\DateTimeImmutable $validUntil,
        string $upgradeStatus,
        ?Response $rawResponse = null,
    ) {
        $this->id = $id;
        $this->url = $url;
        $this->validUntil = $validUntil;
        $this->upgradeStatus = $upgradeStatus;
        $this->rawResponse = $rawResponse;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            id: (string) self::getValue($data, 'id', 'string'),
            url: (string) self::getValue($data, 'url', 'string'),
            validUntil: self::getValue($data, 'valid_until', 'datetime_immutable'),
            upgradeStatus: (string) self::getValue($data, 'upgrade_status', 'string', 'none'),
            rawResponse: $rawResponse,
        );
    }
}
