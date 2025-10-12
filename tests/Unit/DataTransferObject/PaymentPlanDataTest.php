<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\DataTransferObject\PaymentPlanData;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GoSuccess\Digistore24\DataTransferObject\PaymentPlanData
 */
final class PaymentPlanDataTest extends TestCase
{
    public function testCanCreateWithValidData(): void
    {
        $plan = new PaymentPlanData();
        $plan->firstAmount = 9.99;
        $plan->otherAmounts = 29.99;
        $plan->currency = 'eur';
        $plan->numberOfInstallments = 12;

        $this->assertSame(9.99, $plan->firstAmount);
        $this->assertSame(29.99, $plan->otherAmounts);
        $this->assertSame('EUR', $plan->currency); // Auto-uppercased
        $this->assertSame(12, $plan->numberOfInstallments);
    }

    public function testCurrencyIsAutoUppercased(): void
    {
        $plan = new PaymentPlanData();
        $plan->currency = 'usd';

        $this->assertSame('USD', $plan->currency);
    }

    public function testCurrencyValidationThrowsExceptionForInvalidLength(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Currency must be 3-letter code');

        $plan = new PaymentPlanData();
        $plan->currency = 'EURO'; // 4 letters
    }

    public function testAllFieldsCanBeNull(): void
    {
        $plan = new PaymentPlanData();

        $this->assertNull($plan->firstAmount);
        $this->assertNull($plan->otherAmounts);
        $this->assertNull($plan->currency);
        $this->assertNull($plan->numberOfInstallments);
        $this->assertNull($plan->firstBillingInterval);
        $this->assertNull($plan->otherBillingIntervals);
    }

    public function testCanSetBillingIntervals(): void
    {
        $plan = new PaymentPlanData();
        $plan->firstBillingInterval = '1w';
        $plan->otherBillingIntervals = '1m';
        $plan->testInterval = '7d';

        $this->assertSame('1w', $plan->firstBillingInterval);
        $this->assertSame('1m', $plan->otherBillingIntervals);
        $this->assertSame('7d', $plan->testInterval);
    }

    public function testCanSetUpgradeFields(): void
    {
        $plan = new PaymentPlanData();
        $plan->upgradeOrderId = 'ORDER123';
        $plan->upgradeType = 'full';
        $plan->template = 'standard';
        $plan->taxMode = 'net';

        $this->assertSame('ORDER123', $plan->upgradeOrderId);
        $this->assertSame('full', $plan->upgradeType);
        $this->assertSame('standard', $plan->template);
        $this->assertSame('net', $plan->taxMode);
    }
}
