<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\System\PingRequest;
use GoSuccess\Digistore24\Api\Response\System\PingResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('system')]
final class SystemIntegrationTest extends IntegrationTestCase
{
    private Digistore24 $client;

    protected function setUp(): void
    {
        parent::setUp();

        $apiKey = $this->getApiKey();
        $config = new Configuration(apiKey: $apiKey);
        $this->client = new Digistore24($config);
    }

    /**
     * Test ping endpoint
     *
     * @return void
     */
    public function testPing(): void
    {
        $response = $this->client->system->ping(new PingRequest());

        $this->assertInstanceOf(PingResponse::class, $response);
        $this->assertTrue($response->wasSuccessful());
        $this->assertNotEmpty($response->getServerTime());
    }
}
