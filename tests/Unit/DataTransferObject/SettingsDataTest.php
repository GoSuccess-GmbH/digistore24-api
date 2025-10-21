<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\Api\DTO\SettingsData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SettingsData::class)]
final class SettingsDataTest extends TestCase
{
    public function testCanCreateWithValidSettings(): void
    {
        $settings = new SettingsData();
        $settings->orderformId = '12345';
        $settings->affiliateCommissionRate = 15.5;
        $settings->voucherCode = 'SAVE20';

        $this->assertSame('12345', $settings->orderformId);
        $this->assertSame(15.5, $settings->affiliateCommissionRate);
        $this->assertSame('SAVE20', $settings->voucherCode);
    }

    public function testAffiliateCommissionRateValidationThrowsExceptionForNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Affiliate commission rate must be between 0 and 100');

        $settings = new SettingsData();
        $settings->affiliateCommissionRate = -5.0;
    }

    public function testAffiliateCommissionRateValidationThrowsExceptionForOver100(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Affiliate commission rate must be between 0 and 100');

        $settings = new SettingsData();
        $settings->affiliateCommissionRate = 150.0;
    }

    public function testVoucherRateValidationThrowsExceptionForInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Voucher first rate must be between 0 and 100');

        $settings = new SettingsData();
        $settings->voucher1stRate = 200.0;
    }

    public function testPayMethodsValidationThrowsExceptionForInvalidMethod(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid payment method: bitcoin');

        $settings = new SettingsData();
        $settings->payMethods = ['paypal', 'bitcoin'];
    }

    public function testPayMethodsValidationAllowsValidMethods(): void
    {
        $settings = new SettingsData();
        $settings->payMethods = ['paypal', 'creditcard', 'elv'];

        $this->assertSame(['paypal', 'creditcard', 'elv'], $settings->payMethods);
    }

    public function testFromArrayCreatesInstanceCorrectly(): void
    {
        $settings = new SettingsData();
        $settings->orderformId = '12345';
        $settings->img = 'image_123';
        $settings->affiliateCommissionRate = 15.5;
        $settings->affiliateCommissionFix = 10.0;
        $settings->voucherCode = 'SAVE20';
        $settings->voucher1stRate = 20.0;
        $settings->voucherOthRates = 15.0;
        $settings->forceRebilling = true;
        $settings->payMethods = ['paypal', 'creditcard'];

        $this->assertSame('12345', $settings->orderformId);
        $this->assertSame('image_123', $settings->img);
        $this->assertSame(15.5, $settings->affiliateCommissionRate);
        $this->assertSame(10.0, $settings->affiliateCommissionFix);
        $this->assertSame('SAVE20', $settings->voucherCode);
        $this->assertSame(20.0, $settings->voucher1stRate);
        $this->assertSame(15.0, $settings->voucherOthRates);
        $this->assertTrue($settings->forceRebilling);
        $this->assertSame(['paypal', 'creditcard'], $settings->payMethods);
    }

    public function testToArrayConvertsCorrectly(): void
    {
        $settings = new SettingsData();
        $settings->orderformId = '12345';
        $settings->affiliateCommissionRate = 15.5;
        $settings->voucherCode = 'SAVE20';

        $array = $settings->toArray();

        $this->assertSame([
            'orderform_id' => '12345',
            'affiliate_commission_rate' => 15.5,
            'voucher_code' => 'SAVE20',
        ], $array);
    }

    public function testOptionalFieldsCanBeNull(): void
    {
        $settings = new SettingsData();

        $this->assertNull($settings->orderformId);
        $this->assertNull($settings->img);
        $this->assertNull($settings->affiliateCommissionRate);
        $this->assertNull($settings->voucherCode);
        $this->assertNull($settings->forceRebilling);
        $this->assertNull($settings->payMethods);
    }

    public function testImgCanBeString(): void
    {
        $settings = new SettingsData();
        $settings->img = 'image_123';

        $this->assertSame('image_123', $settings->img);
    }

    public function testImgCanBeArray(): void
    {
        $settings = new SettingsData();
        $settings->img = ['product1' => 'image_1', 'product2' => 'image_2'];

        $this->assertSame(['product1' => 'image_1', 'product2' => 'image_2'], $settings->img);
    }
}
