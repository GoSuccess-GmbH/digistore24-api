<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Country;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * @see https://digistore24.com/api/docs/paths/listCurrencies.yaml
 */
final readonly class ListCurrenciesRequest extends AbstractRequest
{
    public function __construct(
        private ?string $convertTo = null,
    ) {}

    public function endpoint(): string
    {
        return 'listCurrencies';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        $params = [];
        if ($this->convertTo !== null) {
            $params['convert_to'] = $this->convertTo;
        }
        return $params;
    }
}
