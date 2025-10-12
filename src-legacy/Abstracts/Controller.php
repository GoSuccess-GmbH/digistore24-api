<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Abstracts;

use GoSuccess\Digistore24\API;

abstract class Controller
{
    public function __construct(
        protected readonly API $api
    ) {}

    /**
     * Map array of stdClass objects to array of model instances
     *
     * @template T
     * @param array<\stdClass> $data
     * @param class-string<T> $modelClass
     * @return array<T>
     */
    protected function mapToModels(array $data, string $modelClass): array
    {
        return array_map(
            fn(\stdClass $item): object => new $modelClass($item),
            $data
        );
    }
}
