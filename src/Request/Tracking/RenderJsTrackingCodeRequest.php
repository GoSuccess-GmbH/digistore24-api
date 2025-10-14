<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Request\Tracking;

use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;

/**
 * Request to render JavaScript tracking code.
 *
 * Creates a JavaScript code that reads the current affiliate, campaign key and
 * tracking key on a landing page and stores them e.g. in hidden inputs.
 *
 * @see https://digistore24.com/api/docs/paths/renderJsTrackingCode.yaml
 */
final readonly class RenderJsTrackingCodeRequest extends AbstractRequest
{
    /**
     * @param string|null $affiliateInput The name of the HTML form input field for affiliate name
     * @param string|null $campaignkeyInput The name of the HTML form input field for campaign key
     * @param string|null $trackingkeyInput The name of the HTML form input field for tracking key
     * @param string|null $callback The name of a JavaScript function to be called with the data
     */
    public function __construct(
        private ?string $affiliateInput = null,
        private ?string $campaignkeyInput = null,
        private ?string $trackingkeyInput = null,
        private ?string $callback = null,
    ) {}

    public function getEndpoint(): string
    {
        return 'renderJsTrackingCode';
    }

    public function getMethod(): Method
    {
        return Method::GET;
    }

    public function getParameters(): array
    {
        $params = [];

        if ($this->affiliateInput !== null) {
            $params['affiliate_input'] = $this->affiliateInput;
        }

        if ($this->campaignkeyInput !== null) {
            $params['campaignkey_input'] = $this->campaignkeyInput;
        }

        if ($this->trackingkeyInput !== null) {
            $params['trackingkey_input'] = $this->trackingkeyInput;
        }

        if ($this->callback !== null) {
            $params['callback'] = $this->callback;
        }

        return $params;
    }
}
