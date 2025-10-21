<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DataTransferObject;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;

/**
 * Buy URL Data Transfer Object
 *
 * Contains information about a buy URL.
 */
final class BuyUrlData extends AbstractDataTransferObject
{
    /**
     * Buy URL ID
     */
    public int $id {
        get => $this->id;
    }

    /**
     * Associated product ID
     */
    public ?int $productId {
        get => $this->productId ?? null;
    }

    /**
     * Generated order URL
     */
    public string $url {
        get => $this->url ?? '';
    }

    /**
     * Creation timestamp
     */
    public ?\DateTimeInterface $createdAt {
        get => $this->createdAt ?? null;
    }

    /**
     * Last modification timestamp
     */
    public ?\DateTimeInterface $modifiedAt {
        get => $this->modifiedAt ?? null;
    }
}
