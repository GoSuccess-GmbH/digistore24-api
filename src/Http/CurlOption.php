<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Http;

/**
 * cURL Options
 * 
 * Type-safe wrapper for cURL options (CURLOPT_* constants).
 * Provides better IDE support and type safety.
 */
enum CurlOption: int
{
    case RETURNTRANSFER = CURLOPT_RETURNTRANSFER;
    case TIMEOUT = CURLOPT_TIMEOUT;
    case FOLLOWLOCATION = CURLOPT_FOLLOWLOCATION;
    case ENCODING = CURLOPT_ENCODING;
    case MAXREDIRS = CURLOPT_MAXREDIRS;
    case HTTP_VERSION = CURLOPT_HTTP_VERSION;
    case CUSTOMREQUEST = CURLOPT_CUSTOMREQUEST;
    case USERAGENT = CURLOPT_USERAGENT;
    case HEADER = CURLOPT_HEADER;
    case HTTPHEADER = CURLOPT_HTTPHEADER;
    case POST = CURLOPT_POST;
    case POSTFIELDS = CURLOPT_POSTFIELDS;
    case URL = CURLOPT_URL;
    case SSL_VERIFYPEER = CURLOPT_SSL_VERIFYPEER;
    case SSL_VERIFYHOST = CURLOPT_SSL_VERIFYHOST;
    case CONNECTTIMEOUT = CURLOPT_CONNECTTIMEOUT;
}

/**
 * cURL Info Options
 * 
 * Type-safe wrapper for curl_getinfo() options.
 */
enum CurlInfo
{
    case HTTP_CODE;
    case HEADER_SIZE;
    case TOTAL_TIME;
    case EFFECTIVE_URL;
    case CONTENT_TYPE;

    /**
     * Get the actual CURLINFO constant value
     */
    public function value(): int
    {
        return match ($this) {
            self::HTTP_CODE => CURLINFO_HTTP_CODE,
            self::HEADER_SIZE => CURLINFO_HEADER_SIZE,
            self::TOTAL_TIME => CURLINFO_TOTAL_TIME,
            self::EFFECTIVE_URL => CURLINFO_EFFECTIVE_URL,
            self::CONTENT_TYPE => CURLINFO_CONTENT_TYPE,
        };
    }
}

/**
 * cURL HTTP Version
 */
enum CurlHttpVersion: int
{
    case HTTP_1_0 = CURL_HTTP_VERSION_1_0;
    case HTTP_1_1 = CURL_HTTP_VERSION_1_1;
    case HTTP_2_0 = CURL_HTTP_VERSION_2_0;
}
