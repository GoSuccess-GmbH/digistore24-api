<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Download file information
 */
final readonly class DownloadFile
{
    public function __construct(
        public string $url,
        public int $downloadsTotal,
        public int $downloadsTries,
        public string $isAccessGranted,
        public string $isPurchasePaid,
        public ?string $headline = null,
        public ?string $instructions = null,
        public ?string $fileName = null,
        public ?string $fileExt = null,
        public ?int $fileSize = null,
        public ?string $downloadUntil = null,
    ) {
    }

    /**
     * Check if access is granted
     */
    public function hasAccess(): bool
    {
        return $this->isAccessGranted === 'Y';
    }

    /**
     * Check if purchase is paid
     */
    public function isPaid(): bool
    {
        return $this->isPurchasePaid === 'Y';
    }

    /**
     * Get remaining downloads
     */
    public function getRemainingDownloads(): int
    {
        return max(0, $this->downloadsTotal - $this->downloadsTries);
    }
}

/**
 * Response from getting purchase downloads
 *
 * @link https://digistore24.com/api/docs/paths/getPurchaseDownloads.yaml OpenAPI Specification
 */
final readonly class GetPurchaseDownloadsResponse extends AbstractResponse
{
    /** @var array<string, array<string, DownloadFile[]>> Downloads grouped by purchase ID and product ID */
    public array $downloads;

    protected function parse(array $data): void
    {
        $downloads = [];

        foreach ($data['downloads'] as $purchaseId => $products) {
            $downloads[$purchaseId] = [];
            
            foreach ($products as $productId => $files) {
                $downloads[$purchaseId][$productId] = [];
                
                foreach ($files as $file) {
                    $downloads[$purchaseId][$productId][] = new DownloadFile(
                        url: $file['url'],
                        downloadsTotal: (int)$file['downloads_total'],
                        downloadsTries: (int)$file['downloads_tries'],
                        isAccessGranted: $file['is_access_granted'],
                        isPurchasePaid: $file['is_purchase_paid'],
                        headline: $file['headline'] ?? null,
                        instructions: $file['instructions'] ?? null,
                        fileName: $file['file_name'] ?? null,
                        fileExt: $file['file_ext'] ?? null,
                        fileSize: isset($file['file_size']) ? (int)$file['file_size'] : null,
                        downloadUntil: $file['download_until'] ?? null,
                    );
                }
            }
        }

        $this->downloads = $downloads;
    }

    /**
     * Get all downloads for a specific purchase
     * 
     * @return array<string, DownloadFile[]>|null
     */
    public function getDownloadsForPurchase(string $purchaseId): ?array
    {
        return $this->downloads[$purchaseId] ?? null;
    }
}
