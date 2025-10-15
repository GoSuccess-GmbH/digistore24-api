<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Payment Plans Request
 *
 * Retrieves a list of all configured payment plans.
 */
final class ListPaymentPlansRequest extends AbstractRequest
{
    public function __construct() {}

    public function getEndpoint(): string { return 'listPaymentPlans'; }

    public function method(): Method { return Method::GET; }

    public function toArray(): array { return []; }
}
