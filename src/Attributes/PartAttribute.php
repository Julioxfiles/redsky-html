<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML part attribute.
 *
 * Specifies one or more names of shadow tree parts that can be
 * styled from outside a shadow DOM tree.
 *
 * Examples:
 *
 * - part="header"
 * - part="button icon"
 */
class PartAttribute extends Attribute
{
    /**
     * Creates a new part attribute instance.
     *
     * @param string|null $value The part name(s).
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('part', $value);
    }

    /**
     * Returns the part name(s).
     *
     * @return string|null
     */
    public function getPart(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the part name(s).
     *
     * @param string|null $value The part name(s).
     *
     * @return static
     */
    public function setPart(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}