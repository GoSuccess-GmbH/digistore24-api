<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\ApiKey\RequestApiKeyRequest;
use GoSuccess\Digistore24\Request\ApiKey\RetrieveApiKeyRequest;
use GoSuccess\Digistore24\Request\ApiKey\UnregisterRequest;
use GoSuccess\Digistore24\Response\ApiKey\RequestApiKeyResponse;
use GoSuccess\Digistore24\Response\ApiKey\RetrieveApiKeyResponse;
use GoSuccess\Digistore24\Response\ApiKey\UnregisterResponse;
final class ApiKeyResource extends AbstractResource
{
    public function request(RequestApiKeyRequest $request): RequestApiKeyResponse
    {
        return $this->executeTyped($request, RequestApiKeyResponse::class);
    }
    public function retrieve(RetrieveApiKeyRequest $request): RetrieveApiKeyResponse
    {
        return $this->executeTyped($request, RetrieveApiKeyResponse::class);
    }
    public function unregister(UnregisterRequest $request): UnregisterResponse
    {
        return $this->executeTyped($request, UnregisterResponse::class);
    }
}
