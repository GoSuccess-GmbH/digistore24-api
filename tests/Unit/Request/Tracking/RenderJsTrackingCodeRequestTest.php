<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Tracking;

use GoSuccess\Digistore24\Api\Request\Tracking\RenderJsTrackingCodeRequest;
use PHPUnit\Framework\TestCase;

final class RenderJsTrackingCodeRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new RenderJsTrackingCodeRequest();
        
        $this->assertInstanceOf(RenderJsTrackingCodeRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new RenderJsTrackingCodeRequest();
        
        $this->assertSame('renderJsTrackingCode', $request->getEndpoint());
    }

    public function test_to_array_with_parameters(): void
    {
        $request = new RenderJsTrackingCodeRequest(
            affiliateInput: 'affiliate',
            campaignkeyInput: 'campaign',
            callback: 'handleTracking'
        );
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('affiliate', $array['affiliate_input']);
        $this->assertSame('campaign', $array['campaignkey_input']);
        $this->assertSame('handleTracking', $array['callback']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new RenderJsTrackingCodeRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

