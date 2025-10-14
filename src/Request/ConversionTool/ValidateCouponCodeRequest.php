<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ConversionTool;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class ValidateCouponCodeRequest extends AbstractRequest
{
    public function __construct(private string $code) {}
    public function getEndpoint(): string { return 'validateCouponCode'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['code' => $this->code]; }
}
