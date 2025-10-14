<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Request\Country;

use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;

/**
 * @see https://digistore24.com/api/docs/paths/listCurrencies.yaml
 */
final readonly class ListCurrenciesRequest extends AbstractRequest
{
    public function __construct(
        private ?string $convertTo = null,
    ) {}

    public function getEndpoint(): string
    {
        return 'listCurrencies';
    }

    public function getMethod(): Method
    {
        return Method::GET;
    }

    public function getParameters(): array
    {
        $params = [];
        if ($this->convertTo !== null) {
            $params['convert_to'] = $this->convertTo;
        }
        return $params;
    }
}
