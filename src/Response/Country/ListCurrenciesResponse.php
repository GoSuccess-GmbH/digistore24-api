<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Country;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * @see https://digistore24.com/api/docs/paths/listCurrencies.yaml
 */
final class ListCurrenciesResponse extends AbstractResponse
{
    /**
     * @param array<int, object{id: int, code: string, symbol: string, min_price: float, max_price: float, name: string}> $currencies
     */
    public function __construct(
        private array $currencies,
    ) {
    }

    /**
     * @return array<int, object{id: int, code: string, symbol: string, min_price: float, max_price: float, name: string}>
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $currencies = array_map(
            fn ($item) => (object)[
                'id' => (int)$item['id'],
                'code' => (string)$item['code'],
                'symbol' => (string)$item['symbol'],
                'min_price' => (float)$item['min_price'],
                'max_price' => (float)$item['max_price'],
                'name' => (string)$item['name'],
            ],
            $data,
        );

        return new self(currencies: $currencies);
    }
}
