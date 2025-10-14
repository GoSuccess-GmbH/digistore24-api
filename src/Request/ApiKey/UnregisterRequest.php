<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ApiKey;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UnregisterRequest extends AbstractRequest
{
    public function __construct() {}
    public function getEndpoint(): string { return 'unregister'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return []; }
}
