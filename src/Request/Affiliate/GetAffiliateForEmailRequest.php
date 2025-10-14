<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Affiliate;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetAffiliateForEmailRequest extends AbstractRequest
{
    public function __construct(private string $email) {}
    public function getEndpoint(): string { return 'getAffiliateForEmail'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['email' => $this->email]; }
}
