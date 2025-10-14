<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Country;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * @see https://digistore24.com/api/docs/paths/listCountries.yaml
 */
final readonly class ListCountriesRequest extends AbstractRequest
{
    public function __construct() {}

    public function endpoint(): string
    {
        return 'listCountries';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return [];
    }
}
