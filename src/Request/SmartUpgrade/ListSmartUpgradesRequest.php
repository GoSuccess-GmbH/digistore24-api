<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\SmartUpgrade;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class ListSmartUpgradesRequest extends AbstractRequest
{
    public function __construct() {}
    public function getEndpoint(): string { return 'listSmartUpgrades'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return []; }
}
