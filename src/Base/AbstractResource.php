<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Base;

use GoSuccess\Digistore24\Api\Contract\HttpClientInterface;
use GoSuccess\Digistore24\Api\Contract\RequestInterface;
use GoSuccess\Digistore24\Api\Contract\ResponseInterface;
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
        protected readonly HttpClientInterface $client
    ) {}

    /**
     * Execute a request and get raw HTTP response
     */
    protected function execute(RequestInterface $request): Response
    {
        $endpoint = $request->getEndpoint();
        $method = $request->getMethod();
        $data = $request->toArray();

        return $this->client->request($endpoint, $method, $data);
    }

    /**
     * Execute a request and parse into typed response
     * 
     * @template T of ResponseInterface
     * @param RequestInterface $request
     * @param class-string<T> $responseClass
     * @return T
     */
    protected function executeTyped(RequestInterface $request, string $responseClass): ResponseInterface
    {
        $response = $this->execute($request);
        return $responseClass::fromResponse($response);
    }
}
