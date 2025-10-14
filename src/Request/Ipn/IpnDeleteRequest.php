<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Ipn;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class IpnDeleteRequest extends AbstractRequest
{
    public function __construct() {}
    public function endpoint(): string { return 'ipnDelete'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return []; }
}
