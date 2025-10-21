<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\Image;

use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Response\Image\DeleteImageResponse;
use PHPUnit\Framework\TestCase;

final class DeleteImageResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'success' => true,
            'image_id' => 'IMG123',
            'message' => 'Image deleted successfully',
        ];
        $response = DeleteImageResponse::fromArray($data);

        $this->assertInstanceOf(DeleteImageResponse::class, $response);
        $this->assertTrue($response->success);
        $this->assertSame('IMG123', $response->imageId);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [
                'success' => true,
                'image_id' => 'IMG456',
            ],
            headers: [],
            rawBody: '',
        );

        $response = DeleteImageResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(DeleteImageResponse::class, $response);
        $this->assertTrue($response->success);
    }

    public function test_has_raw_response(): void
    {
        $httpResponse = new Response(
            statusCode: 200,
            data: [],
            headers: [],
            rawBody: 'test',
        );

        $response = DeleteImageResponse::fromResponse($httpResponse);

        $this->assertInstanceOf(Response::class, $response->rawResponse);
    }
}
