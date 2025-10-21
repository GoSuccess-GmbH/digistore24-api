<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Exception;

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
        $error = $this->getContextValue('curl_errno', null);

        return is_int($error) ? $error : null;
    }
}
