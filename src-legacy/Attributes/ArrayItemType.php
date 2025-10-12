<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final readonly class ArrayItemType
{
    /**
     * @param string|null $type Array item type (class, enum, int, float, etc.)
     * @param string|null $object Object name (fully qualified class or enum name)
     */
    public function __construct(
        public ?string $type = null,
        public ?string $object = null
    ) {}
}
