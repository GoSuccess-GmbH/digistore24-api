<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnInfoRequest;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnInfoResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('ipn')]
final class IpnIntegrationTest extends IntegrationTestCase
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
     * Test getting IPN information
     *
     * @return void
     */
    public function testGetIpnInfo(): void
    {
        $response = $this->client->ipn->info(new IpnInfoRequest());

        $this->assertInstanceOf(IpnInfoResponse::class, $response);
    }
}
