<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML itemtype attribute.
 *
 * Specifies the vocabulary URL used to define the type of a
 * microdata item.
 *
 * Examples:
 *
 * - itemtype="https://schema.org/Person"
 * - itemtype="https://schema.org/Product"
 */
class ItemtypeAttribute extends Attribute
{
    /**
     * Creates a new itemtype attribute instance.
     *
     * @param string|null $value The item type URL.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('itemtype', $value);
    }

    /**
     * Returns the item type URL.
     *
     * @return string|null
     */
    public function getItemtype(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the item type URL.
     *
     * @param string|null $value The item type URL.
     *
     * @return static
     */
    public function setItemtype(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}