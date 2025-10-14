<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Base;

use GoSuccess\Digistore24\Api\Client\ApiClient;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Abstract Resource Base Class
 * 
 * Base class for all API resource classes.
 * Resources group related API endpoints together.
 */
abstract class AbstractResource
{
    public function __construct(
        protected readonly ApiClient $client
    ) {}

    /**
     * Execute a request and get raw HTTP response
     */
    protected function execute(AbstractRequest $request): Response
    {
        $endpoint = $request->endpoint();
        $method = $request->method();
        $data = $request->toArray();

        return $this->client->request($endpoint, $method, $data);
    }

    /**
     * Execute a request and parse into typed response
     * 
     * @template T of AbstractResponse
     * @param AbstractRequest $request
     * @param class-string<T> $responseClass
     * @return T
     */
    protected function executeTyped(AbstractRequest $request, string $responseClass): AbstractResponse
    {
        $response = $this->execute($request);
        return $responseClass::fromResponse($response);
    }
}
