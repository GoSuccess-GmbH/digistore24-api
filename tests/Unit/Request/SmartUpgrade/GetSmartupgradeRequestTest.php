<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\SmartUpgrade;

use GoSuccess\Digistore24\Api\Request\SmartUpgrade\GetSmartupgradeRequest;
use PHPUnit\Framework\TestCase;

final class GetSmartupgradeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetSmartupgradeRequest(smartupgradeId: 'SU123');

        $this->assertInstanceOf(GetSmartupgradeRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetSmartupgradeRequest(smartupgradeId: 'SU123');

        $this->assertSame('/getSmartupgrade', $request->getEndpoint());
    }

    public function test_to_array_includes_smartupgrade_id(): void
    {
        $request = new GetSmartupgradeRequest(smartupgradeId: 'SU123', purchaseId: 'P12345');

        $array = $request->toArray();
        $this->assertSame('SU123', $array['smartupgrade_id']);
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetSmartupgradeRequest(smartupgradeId: 'SU123');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
