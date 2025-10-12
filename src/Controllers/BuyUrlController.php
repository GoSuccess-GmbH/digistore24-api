<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\BuyUrl\BuyUrl;
use GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Models\BuyUrl\CreateBuyUrlResponse;
use GoSuccess\Digistore24\Models\BuyUrl\DeleteBuyUrlResponse;

class BuyUrlController extends Controller
{
    /**
     * Creates a special order URL
     * @link https://dev.digistore24.com/en/articles/18-createbuyurl
     * @param CreateBuyUrlRequest $buyUrl
     * @return CreateBuyUrlResponse|null
     */
    public function create(CreateBuyUrlRequest $buyUrl): ?CreateBuyUrlResponse
    {
        $data = $this->api->call(
            'createBuyUrl',
            $buyUrl->product_id,
            $buyUrl->buyer === null ? [] : get_object_vars($buyUrl->buyer),
            $buyUrl->payment_plan === null ? [] : get_object_vars($buyUrl->payment_plan),
            $buyUrl->tracking === null ? [] : get_object_vars($buyUrl->tracking),
            $buyUrl->valid_until,
            $buyUrl->urls === null ? [] : get_object_vars($buyUrl->urls),
            $buyUrl->placeholders,
            $buyUrl->settings === null ? [] : get_object_vars($buyUrl->settings),
            $buyUrl->addons === null ? [] : array_map(
                fn(object $addon): array => get_object_vars($addon),
                $buyUrl->addons
            ),
        );
        
        if (!$data) {
            return null;
        }

        return new CreateBuyUrlResponse($data);
    }

    /**
     * List generated order URLs
     * @link https://dev.digistore24.com/en/articles/64-listbuyurls
     * @param int $pageNo
     * @param int $pageSize
     * @return array<BuyUrl>|null
     */
    public function list(int $pageNo = 1, int $pageSize = 100): ?array
    {
        $data = $this->api->call('listBuyUrls', $pageNo, $pageSize);
        
        if (!$data) {
            return null;
        }

        return $this->mapToModels($data->buyurls, BuyUrl::class);
    }

    /**
     * Delete a generated form URL
     * @link https://dev.digistore24.com/en/articles/28-deletebuyurl
     * @param int $buyUrlId
     * @return DeleteBuyUrlResponse|null
     */
    public function delete(int $buyUrlId): ?DeleteBuyUrlResponse
    {
        $data = $this->api->call('deleteBuyUrl', $buyUrlId);
        
        if (!$data) {
            return null;
        }

        return new DeleteBuyUrlResponse($data);
    }
}
