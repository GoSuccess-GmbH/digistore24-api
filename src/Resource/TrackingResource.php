<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Purchase\GetPurchaseTrackingRequest;
use GoSuccess\Digistore24\Api\Request\Tracking\RenderJsTrackingCodeRequest;
use GoSuccess\Digistore24\Api\Response\Purchase\GetPurchaseTrackingResponse;
use GoSuccess\Digistore24\Api\Response\Tracking\RenderJsTrackingCodeResponse;

/**
 * Tracking Resource
 *
 * Manage tracking codes and purchase tracking data.
 */
final class TrackingResource extends AbstractResource
{
    /**
     * Render JavaScript tracking code
     *
     * Creates a JavaScript code that reads the current affiliate, campaign key and
     * tracking key on a landing page and stores them e.g. in hidden inputs.
     *
     * @link https://digistore24.com/api/docs/paths/renderJsTrackingCode.yaml OpenAPI Specification
     *
     * @param RenderJsTrackingCodeRequest $request The render JS tracking code request
     * @throws ApiException
     * @return RenderJsTrackingCodeResponse The response with JavaScript tracking code
     */
    public function renderJsCode(RenderJsTrackingCodeRequest $request): RenderJsTrackingCodeResponse
    {
        return $this->executeTyped($request, RenderJsTrackingCodeResponse::class);
    }

    /**
     * Get purchase tracking data
     *
     * Retrieves tracking data for a specific purchase.
     * This is a convenience method that delegates to PurchaseResource.
     *
     * @link https://digistore24.com/api/docs/paths/getPurchaseTracking.yaml OpenAPI Specification
     *
     * @param GetPurchaseTrackingRequest $request The get purchase tracking request
     * @throws ApiException
     * @return GetPurchaseTrackingResponse The response with tracking data
     */
    public function getPurchaseTracking(GetPurchaseTrackingRequest $request): GetPurchaseTrackingResponse
    {
        return $this->executeTyped($request, GetPurchaseTrackingResponse::class);
    }
}
