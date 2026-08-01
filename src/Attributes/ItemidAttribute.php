<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML itemid attribute.
 *
 * Specifies a unique global identifier for an item when used
 * with the HTML microdata specification.
 *
 * Examples:
 *
 * - itemid="https://example.com/products/123"
 */
class ItemidAttribute extends Attribute
{
    /**
     * Creates a new itemid attribute instance.
     *
     * @param string|null $value The item identifier.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('itemid', $value);
    }

    /**
     * Returns the item identifier.
     *
     * @return string|null
     */
    public function getItemid(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the item identifier.
     *
     * @param string|null $value The item identifier.
     *
     * @return static
     */
    public function setItemid(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}