<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML rel attribute.
 *
 * Used by anchor, link and area elements to define the
 * relationship between the current document and the linked resource.
 *
 * Examples:
 *
 * - rel="noopener"
 * - rel="noreferrer"
 * - rel="stylesheet"
 * - rel="alternate"
 */
class RelAttribute extends Attribute
{
    /**
     * Creates a new rel attribute instance.
     *
     * @param string|null $value The relationship value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('rel', $value);
    }

    /**
     * Returns the relationship value.
     *
     * @return string|null
     */
    public function getRel(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the relationship value.
     *
     * @param string|null $value The relationship value.
     *
     * @return static
     */
    public function setRel(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}