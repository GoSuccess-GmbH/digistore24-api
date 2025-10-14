<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Ipn;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class IpnSetupRequest extends AbstractRequest
{
    public function __construct(private string $url, private ?string $ipnPassword = null) {}
    public function endpoint(): string { return 'ipnSetup'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        $params = ['url' => $this->url];
        if ($this->ipnPassword !== null) $params['ipn_password'] = $this->ipnPassword;
        return $params;
    }
}
