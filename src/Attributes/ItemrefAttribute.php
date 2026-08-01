<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML itemref attribute.
 *
 * Specifies additional element IDs that should be included
 * as part of a microdata item.
 *
 * Examples:
 *
 * - itemref="additional-info"
 * - itemref="address details"
 */
class ItemrefAttribute extends Attribute
{
    /**
     * Creates a new itemref attribute instance.
     *
     * @param string|null $value The referenced element IDs.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('itemref', $value);
    }

    /**
     * Returns the referenced element IDs.
     *
     * @return string|null
     */
    public function getItemref(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the referenced element IDs.
     *
     * @param string|null $value The referenced element IDs.
     *
     * @return static
     */
    public function setItemref(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}