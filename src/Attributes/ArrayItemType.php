<?php

namespace GoSuccess\Digistore24\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class ArrayItemType
{
    /**
     * Array item type (class, enum, int ...).
     * @var string|null
     */
    public ?string $type = null;

    /**
     * Object name, if necessary.
     * @var string
     */
    public ?string $object = null;

    public function __construct( ?string $type = null, ?string $object = null )
    {
        $this->type = $type;
        $this->object = $object;
    }
}
