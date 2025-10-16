<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Purchase;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Purchase\GetPurchaseDownloadsResponse;
use PHPUnit\Framework\TestCase;

final class GetPurchaseDownloadsResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'data' => [
                'downloads' => [
                    [
                        'download_id' => 'DL001',
                        'file_name' => 'ebook.pdf',
                        'download_url' => 'https://example.com/download/ebook.pdf',
                        'expires_at' => '2024-12-31',
                    ],
                    [
                        'download_id' => 'DL002',
                        'file_name' => 'video.mp4',
                        'download_url' => 'https://example.com/download/video.mp4',
                    ],
                ],
            ],
        ];
        $response = GetPurchaseDownloadsResponse::fromArray($data);

        $this->assertInstanceOf(GetPurchaseDownloadsResponse::class, $response);
        $downloads = $response->getDownloads();
        $this->assertCount(2, $downloads);
        // Downloads is array<string, mixed> per PHPDoc, access by key not index
        $this->assertNotEmpty($downloads);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'downloads' => [
                        [
                            'download_id' => 'DL999',
                            'file_name' => 'bonus.pdf',
                        ],
                    ],
                ],
            ],
            headers: [],
            rawBody: '',
        );

        $response = GetPurchaseDownloadsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(GetPurchaseDownloadsResponse::class, $response);
        $this->assertCount(1, $response->getDownloads());
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'data' => [
                    'downloads' => [],
                ],
            ],
            headers: [],
            rawBody: 'test',
        );

        $response = GetPurchaseDownloadsResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
