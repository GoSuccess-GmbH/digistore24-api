<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Marketplace;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Marketplace Entries Request
 *
 * Retrieves a list of all marketplace entries.
 */
final class ListMarketplaceEntriesRequest extends AbstractRequest
{
    public function __construct() {}

    public function getEndpoint(): string { return '/listMarketplaceEntries'; }

    public function method(): Method { return Method::GET; }

    public function toArray(): array { return []; }
}
