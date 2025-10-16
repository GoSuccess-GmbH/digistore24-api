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
        $currencies = [];
        foreach ($data as $item) {
            if (!is_array($item)) {
                continue;
            }

            $id = $item['id'] ?? 0;
            $code = $item['code'] ?? '';
            $symbol = $item['symbol'] ?? '';
            $minPrice = $item['min_price'] ?? 0.0;
            $maxPrice = $item['max_price'] ?? 0.0;
            $name = $item['name'] ?? '';

            $currencies[] = (object)[
                'id' => is_int($id) ? $id : 0,
                'code' => is_string($code) ? $code : '',
                'symbol' => is_string($symbol) ? $symbol : '',
                'min_price' => is_float($minPrice) ? $minPrice : (is_numeric($minPrice) ? (float)$minPrice : 0.0),
                'max_price' => is_float($maxPrice) ? $maxPrice : (is_numeric($maxPrice) ? (float)$maxPrice : 0.0),
                'name' => is_string($name) ? $name : '',
            ];
        }

        return new self(currencies: $currencies);
    }
}
