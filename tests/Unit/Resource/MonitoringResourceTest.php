<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Resource;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\System\PingRequest;
use GoSuccess\Digistore24\Api\Response\System\PingResponse;
use PHPUnit\Framework\TestCase;

final class MonitoringResourceTest extends TestCase
{
    public function test_monitoring_resource_exists(): void
    {
        $config = new Configuration(apiKey: 'TEST-API-KEY-12345');
        $client = new Digistore24($config);

        $this->assertInstanceOf(\GoSuccess\Digistore24\Api\Resource\MonitoringResource::class, $client->monitoring);
    }

    public function test_ping_accepts_null_request(): void
    {
        $config = new Configuration(apiKey: 'TEST-API-KEY-12345');
        $client = new Digistore24($config);

        // Verify the method signature accepts null
        $reflection = new \ReflectionMethod($client->monitoring, 'ping');
        $params = $reflection->getParameters();

        $this->assertCount(1, $params);
        $this->assertTrue($params[0]->allowsNull());
        $this->assertSame('request', $params[0]->getName());
    }

    public function test_ping_returns_ping_response(): void
    {
        $config = new Configuration(apiKey: 'TEST-API-KEY-12345');
        $client = new Digistore24($config);

        $reflection = new \ReflectionMethod($client->monitoring, 'ping');
        $returnType = $reflection->getReturnType();

        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame(PingResponse::class, $returnType->getName());
    }

    public function test_ping_request_can_be_instantiated(): void
    {
        $request = new PingRequest();

        $this->assertInstanceOf(PingRequest::class, $request);
    }
}
