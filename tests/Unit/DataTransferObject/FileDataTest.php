<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\Api\DataTransferObject\FileData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileData::class)]
final class FileDataTest extends TestCase
{
    public function testCanCreateWithValidUrl(): void
    {
        $file = new FileData();
        $file->url = 'https://example.com/file.pdf';
        $file->filename = 'document.pdf';

        $this->assertSame('https://example.com/file.pdf', $file->url);
        $this->assertSame('document.pdf', $file->filename);
    }

    public function testUrlValidationThrowsExceptionForInvalidUrl(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('URL must be a valid URL');

        $file = new FileData();
        $file->url = 'not-a-valid-url';
    }

    public function testFromArrayCreatesInstanceCorrectly(): void
    {
        $data = [
            'url' => 'https://example.com/file.pdf',
            'filename' => 'document.pdf',
        ];

        $file = FileData::fromArray($data);

        $this->assertSame('https://example.com/file.pdf', $file->url);
        $this->assertSame('document.pdf', $file->filename);
    }

    public function testFromArrayWithoutFilename(): void
    {
        $data = [
            'url' => 'https://example.com/file.pdf',
        ];

        $file = FileData::fromArray($data);

        $this->assertSame('https://example.com/file.pdf', $file->url);
        $this->assertNull($file->filename);
    }

    public function testToArrayConvertsCorrectly(): void
    {
        $file = new FileData();
        $file->url = 'https://example.com/file.pdf';
        $file->filename = 'document.pdf';

        $array = $file->toArray();

        $this->assertSame([
            'url' => 'https://example.com/file.pdf',
            'filename' => 'document.pdf',
        ], $array);
    }

    public function testFilenameIsOptional(): void
    {
        $file = new FileData();
        $file->url = 'https://example.com/file.pdf';

        $this->assertNull($file->filename);
    }

    public function testToArrayExcludesNullFilename(): void
    {
        $file = new FileData();
        $file->url = 'https://example.com/file.pdf';

        $array = $file->toArray();

        $this->assertSame(['url' => 'https://example.com/file.pdf'], $array);
        $this->assertArrayNotHasKey('filename', $array);
    }
}
