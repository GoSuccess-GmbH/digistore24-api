<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Invoice\ListInvoicesRequest;
use GoSuccess\Digistore24\Request\Invoice\ResendInvoiceMailRequest;
use GoSuccess\Digistore24\Response\Invoice\ListInvoicesResponse;
use GoSuccess\Digistore24\Response\Invoice\ResendInvoiceMailResponse;
final class InvoiceResource extends AbstractResource
{
    public function list(ListInvoicesRequest $request): ListInvoicesResponse
    {
        return $this->executeTyped($request, ListInvoicesResponse::class);
    }
    public function resendMail(ResendInvoiceMailRequest $request): ResendInvoiceMailResponse
    {
        return $this->executeTyped($request, ResendInvoiceMailResponse::class);
    }
}
