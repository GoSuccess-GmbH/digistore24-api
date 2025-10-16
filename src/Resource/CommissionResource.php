<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Exception\ApiException;
use GoSuccess\Digistore24\Api\Request\Commission\ListCommissionsRequest;
use GoSuccess\Digistore24\Api\Response\Commission\ListCommissionsResponse;

/**
 * Commission Resource
 *
 * Manage and retrieve affiliate commission information.
 */
final class CommissionResource extends AbstractResource
{
    /**
     * List affiliate commissions
     *
     * Returns a list of your Digistore24 commission amounts with flexible
     * filtering by time range, transaction type, commission type, and purchase ID.
     *
     * @link https://digistore24.com/api/docs/paths/listCommissions.yaml OpenAPI Specification
     *
     * @param ListCommissionsRequest $request The list commissions request
     * @throws ApiException
     * @return ListCommissionsResponse The response with commission list
     */
    public function list(ListCommissionsRequest $request): ListCommissionsResponse
    {
        return $this->executeTyped($request, ListCommissionsResponse::class);
    }
}
