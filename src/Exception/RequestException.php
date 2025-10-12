<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Exception;

/**
 * Thrown when HTTP request fails (cURL errors, connection issues)
 */
class RequestException extends ApiException
{
    /**
     * Get cURL error number
     */
    public function getCurlError(): ?int
    {
        return $this->getContextValue('curl_errno');
    }
}
