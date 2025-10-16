# Script to make Request parameters optional where appropriate

$requestsNoParams = @(
    'UnregisterRequest',
    'ListCountriesRequest',
    'IpnDeleteRequest',
    'IpnInfoRequest',
    'ListMarketplaceEntriesRequest',
    'GetOrderformMetasRequest',
    'ListOrderformsRequest',
    'ListPaymentPlansRequest',
    'ListPayoutsRequest',
    'StatsExpectedPayoutsRequest',
    'ListProductTypesRequest',
    'ListProductGroupsRequest',
    'ListShippingCostPoliciesRequest',
    'ListSmartUpgradesRequest',
    'GetGlobalSettingsRequest',
    'PingRequest',
    'ListUpgradesRequest',
    'GetUserInfoRequest',
    'ListVouchersRequest'
)

$requestsAllOptional = @(
    'CreateBillingOnDemandRequest',
    'ListBuyersRequest',
    'UpdateBuyerRequest',
    'ListCommissionsRequest',
    'ListCurrenciesRequest',
    'ListCustomFormRecordsRequest',
    'ListDeliveriesRequest',
    'CreateEticketRequest',
    'ListEticketsRequest',
    'CreateImageRequest',
    'ListImagesRequest',
    'IpnSetupRequest',
    'StatsMarketplaceRequest',
    'CopyProductRequest',
    'CreateProductRequest',
    'ListProductsRequest',
    'UpdateProductRequest',
    'CreateAddonChangePurchaseRequest',
    'CreateUpgradePurchaseRequest',
    'ListPurchasesRequest',
    'RefundPurchaseRequest',
    'UpdatePurchaseRequest',
    'ListRebillingStatusChangesRequest',
    'ListServiceProofRequestsRequest',
    'GetSmartupgradeRequest',
    'StatsAffiliateToplistRequest',
    'StatsDailyAmountsRequest',
    'StatsSalesRequest',
    'StatsSalesSummaryRequest',
    'RenderJsTrackingCodeRequest',
    'ListTransactionsRequest',
    'RefundTransactionRequest'
)

Write-Host "Requests that should be optional:" -ForegroundColor Green
Write-Host "NO PARAMS ($(($requestsNoParams).Count)):" -ForegroundColor Cyan
$requestsNoParams | ForEach-Object { Write-Host "  - $_" }
Write-Host "`nALL OPTIONAL ($(($requestsAllOptional).Count)):" -ForegroundColor Cyan
$requestsAllOptional | ForEach-Object { Write-Host "  - $_" }

Write-Host "`nTotal: $(($requestsNoParams + $requestsAllOptional).Count) requests should be optional" -ForegroundColor Yellow
