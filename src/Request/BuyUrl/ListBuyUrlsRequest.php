<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List Buy URLs Request
 * 
 * Retrieves a list of all generated buy URLs.
 * 
 * @link https://digistore24.com/api/docs/paths/listBuyUrls.yaml
 */
final readonly class ListBuyUrlsRequest extends AbstractRequest
{
    public function endpoint(): string
    {
        return '/listBuyUrls';
    }

    public function toArray(): array
    {
        return [];
    }

    
}
