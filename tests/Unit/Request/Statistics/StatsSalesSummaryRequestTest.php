<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Statistics;

use GoSuccess\Digistore24\Api\Request\Statistics\StatsSalesSummaryRequest;
use PHPUnit\Framework\TestCase;

final class StatsSalesSummaryRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new StatsSalesSummaryRequest();

        $this->assertInstanceOf(StatsSalesSummaryRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new StatsSalesSummaryRequest();

        $this->assertSame('/statsSalesSummary', $request->getEndpoint());
    }

    public function test_to_array_with_date_range(): void
    {
        $request = new StatsSalesSummaryRequest(from: '2024-01-01', to: '2024-12-31');

        $array = $request->toArray();        $this->assertSame('2024-01-01', $array['from']);
        $this->assertSame('2024-12-31', $array['to']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new StatsSalesSummaryRequest();

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
