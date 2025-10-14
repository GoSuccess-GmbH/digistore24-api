<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Resource;

use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\CustomForm\ListCustomFormRecordsRequest;
use GoSuccess\Digistore24\Response\CustomForm\ListCustomFormRecordsResponse;

/**
 * Custom Form Resource
 * 
 * Retrieve custom form data collected during checkout.
 */
final class CustomFormResource extends AbstractResource
{
    /**
     * List custom form records
     * 
     * Returns a list with data from additional input fields collected
     * during the checkout process.
     * 
     * @link https://digistore24.com/api/docs/paths/listCustomFormRecords.yaml OpenAPI Specification
     * 
     * @param ListCustomFormRecordsRequest $request The list custom form records request
     * @return ListCustomFormRecordsResponse The response with custom form records
     * @throws \GoSuccess\Digistore24\Exception\ApiException
     */
    public function listRecords(ListCustomFormRecordsRequest $request): ListCustomFormRecordsResponse
    {
        return $this->executeTyped($request, ListCustomFormRecordsResponse::class);
    }
}
