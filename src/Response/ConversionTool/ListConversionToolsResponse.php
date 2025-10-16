<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ConversionTool;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Conversion Tools Response
 *
 * Response object for the ConversionTool API endpoint.
 */
final class ListConversionToolsResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $smartupgrades
     */
    public function __construct(private array $smartupgrades)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getSmartupgrades(): array
    {
        return $this->smartupgrades;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $smartupgrades = $data['smartupgrades'] ?? [];

        if (!is_array($smartupgrades)) {
            $smartupgrades = [];
        }

        /** @var array<string, mixed> $validatedSmartupgrades */
        $validatedSmartupgrades = $smartupgrades;

        return new self(smartupgrades: $validatedSmartupgrades);
    }
}
