<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\AccountAccess;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Log Member Access Response
 *
 * Response after successfully logging member access.
 */
final class LogMemberAccessResponse extends AbstractResponse
{
    /**
     * @param bool $success Whether the access was successfully logged
     * @param string|null $message Optional message from the API
     */
    public function __construct(
        public readonly bool $success,
        public readonly ?string $message = null,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $success = self::getValue($data, 'success', 'bool', true);
        $message = self::getValue($data, 'message', 'string');

        return new self(
            success: is_bool($success) ? $success : (bool)$success,
            message: $message === null || is_string($message) ? $message : null,
        );
    }
}
