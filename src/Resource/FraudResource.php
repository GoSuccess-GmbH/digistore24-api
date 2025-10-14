<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Fraud\ReportFraudRequest;
use GoSuccess\Digistore24\Api\Response\Fraud\ReportFraudResponse;

/**
 * Fraud Resource
 * 
 * Report and manage fraudulent activities.
 */
final class FraudResource extends AbstractResource
{
    /**
     * Report fraud
     * 
     * Reports the customer and/or the affiliate as fraud.
     * 
     * @link https://digistore24.com/api/docs/paths/reportFraud.yaml OpenAPI Specification
     * 
     * @param ReportFraudRequest $request The report fraud request
     * @return ReportFraudResponse The response with fraud report results
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function report(ReportFraudRequest $request): ReportFraudResponse
    {
        return $this->executeTyped($request, ReportFraudResponse::class);
    }
}
