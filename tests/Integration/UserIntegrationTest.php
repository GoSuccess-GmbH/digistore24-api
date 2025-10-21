<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\User\GetUserInfoRequest;
use GoSuccess\Digistore24\Api\Response\User\GetUserInfoResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('user')]
final class UserIntegrationTest extends IntegrationTestCase
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
     * Test getting user info
     */
    public function testGetUserInfo(): void
    {
        $response = $this->client->users->getInfo(new GetUserInfoRequest());

        $this->assertInstanceOf(GetUserInfoResponse::class, $response);
        $this->assertNotEmpty($response->userInfo);
    }
}
