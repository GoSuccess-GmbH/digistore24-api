<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Exception;

/**
 * Thrown when rate limit is exceeded (HTTP 429)
 */
class RateLimitException extends ApiException
{
    /**
     * Get retry-after time in seconds
     */
    public function getRetryAfter(): ?int
    {
        $retryAfter = $this->getContextValue('retry_after', null);

        return is_int($retryAfter) ? $retryAfter : null;
    }
}
