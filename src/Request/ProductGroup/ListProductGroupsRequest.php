<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ProductGroup;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class ListProductGroupsRequest extends AbstractRequest
{
    public function __construct() {}
    public function endpoint(): string { return 'listProductGroups'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return []; }
}
