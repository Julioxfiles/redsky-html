<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML slot attribute.
 *
 * Specifies which named slot a child element belongs to when
 * using Web Components and Shadow DOM.
 *
 * Examples:
 *
 * - slot="header"
 * - slot="footer"
 */
class SlotAttribute extends Attribute
{
    /**
     * Creates a new slot attribute instance.
     *
     * @param string|null $value The slot name.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('slot', $value);
    }

    /**
     * Returns the slot name.
     *
     * @return string|null
     */
    public function getSlot(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the slot name.
     *
     * @param string|null $value The slot name.
     *
     * @return static
     */
    public function setSlot(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}