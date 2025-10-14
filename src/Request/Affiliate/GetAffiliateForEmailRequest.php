<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Affiliate;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class GetAffiliateForEmailRequest extends AbstractRequest
{
    public function __construct(private string $email) {}
    public function endpoint(): string { return 'getAffiliateForEmail'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['email' => $this->email]; }
}
