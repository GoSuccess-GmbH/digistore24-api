<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Request\Voucher\GetVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\ListVouchersRequest;
use GoSuccess\Digistore24\Api\Response\Voucher\GetVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\ListVouchersResponse;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration')]
#[Group('voucher')]
final class VoucherIntegrationTest extends IntegrationTestCase
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
     * Test getting a voucher
     *
     * @return void
     */
    public function testGetVoucher(): void
    {
        $voucherCode = $this->requireConfig(
            'DS24_TEST_VOUCHER_CODE',
            'Test voucher code required for voucher tests'
        );

        $response = $this->client->vouchers->get(new GetVoucherRequest(code: $voucherCode));

        $this->assertInstanceOf(GetVoucherResponse::class, $response);
    }

    /**
     * Test listing vouchers
     *
     * @return void
     */
    public function testListVouchers(): void
    {
        $response = $this->client->vouchers->list(new ListVouchersRequest());

        $this->assertInstanceOf(ListVouchersResponse::class, $response);
    }
}
