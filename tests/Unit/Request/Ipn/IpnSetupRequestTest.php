<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Ipn;

use GoSuccess\Digistore24\Api\Enum\IpnNewsletterSendPolicy;
use GoSuccess\Digistore24\Api\Enum\IpnTiming;
use GoSuccess\Digistore24\Api\Enum\IpnTransactionCategory;
use GoSuccess\Digistore24\Api\Enum\IpnTransactionType;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnSetupRequest;
use PHPUnit\Framework\TestCase;

final class IpnSetupRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new IpnSetupRequest(
            ipnUrl: 'https://example.com/ipn',
            name: 'My Platform',
            productIds: 'all',
        );

        $this->assertInstanceOf(IpnSetupRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new IpnSetupRequest(
            ipnUrl: 'https://example.com/ipn',
            name: 'My Platform',
            productIds: 'all',
        );

        $this->assertSame('/ipnSetup', $request->getEndpoint());
    }

    public function test_to_array_includes_required_fields(): void
    {
        $request = new IpnSetupRequest(
            ipnUrl: 'https://example.com/ipn',
            name: 'My Platform',
            productIds: 'all',
        );

        $array = $request->toArray();
        $this->assertSame('https://example.com/ipn', $array['ipn_url']);
        $this->assertSame('My Platform', $array['name']);
        $this->assertSame('all', $array['product_ids']);
        $this->assertSame('payment,refund,chargeback,payment_missed', $array['transactions']);
        $this->assertSame('before_thankyou', $array['timing']);
        $this->assertSame('send_always', $array['newsletter_send_policy']);
    }

    public function test_to_array_includes_optional_fields(): void
    {
        $request = new IpnSetupRequest(
            ipnUrl: 'https://example.com/ipn',
            name: 'My Platform',
            productIds: '123,456',
            domainId: 'my-platform',
            categories: [IpnTransactionCategory::ORDERS, IpnTransactionCategory::AFFILIATIONS],
            transactions: [IpnTransactionType::PAYMENT, IpnTransactionType::REFUND],
            timing: IpnTiming::DELAYED,
            shaPassphrase: 'secret123',
            newsletterSendPolicy: IpnNewsletterSendPolicy::SEND_IF_OPTIN,
        );

        $array = $request->toArray();
        $this->assertSame('https://example.com/ipn', $array['ipn_url']);
        $this->assertSame('My Platform', $array['name']);
        $this->assertSame('123,456', $array['product_ids']);
        $this->assertSame('my-platform', $array['domain_id']);
        $this->assertSame('orders,affiliations', $array['categories']);
        $this->assertSame('payment,refund', $array['transactions']);
        $this->assertSame('delayed', $array['timing']);
        $this->assertSame('secret123', $array['sha_passphrase']);
        $this->assertSame('send_if_optin', $array['newsletter_send_policy']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new IpnSetupRequest(
            ipnUrl: 'https://example.com/ipn',
            name: 'My Platform',
            productIds: 'all',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
