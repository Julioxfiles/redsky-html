<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML itemprop attribute.
 *
 * Specifies one or more properties of a microdata item.
 *
 * Examples:
 *
 * - itemprop="name"
 * - itemprop="author"
 * - itemprop="price currency"
 */
class ItempropAttribute extends Attribute
{
    /**
     * Creates a new itemprop attribute instance.
     *
     * @param string|null $value The item property name(s).
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('itemprop', $value);
    }

    /**
     * Returns the item property value.
     *
     * @return string|null
     */
    public function getItemprop(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the item property value.
     *
     * @param string|null $value The item property name(s).
     *
     * @return static
     */
    public function setItemprop(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}