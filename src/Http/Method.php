<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Http;

/**
 * HTTP Methods supported by the API
 */
enum Method: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case PATCH = 'PATCH';
}
