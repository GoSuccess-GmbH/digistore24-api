<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Request\Country;

use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;

/**
 * @see https://digistore24.com/api/docs/paths/listCountries.yaml
 */
final readonly class ListCountriesRequest extends AbstractRequest
{
    public function __construct() {}

    public function getEndpoint(): string
    {
        return 'listCountries';
    }

    public function getMethod(): Method
    {
        return Method::GET;
    }

    public function getParameters(): array
    {
        return [];
    }
}
