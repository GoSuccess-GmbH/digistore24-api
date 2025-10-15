<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Upgrade;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Upgrade Request
 *
 * Creates a new upgrade path between products.
 */
final class CreateUpgradeRequest extends AbstractRequest
{
    /**
     * @param array $data The upgrade configuration (source product, target product, pricing, etc.)
     */
    public function __construct(private array $data) {}

    public function getEndpoint(): string { return 'createUpgrade'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array { return $this->data; }
}
