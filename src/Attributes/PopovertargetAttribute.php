<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML popovertarget attribute.
 *
 * Specifies the id of a popover element controlled by a
 * button or interactive element.
 *
 * Examples:
 *
 * - popovertarget="menu"
 * - popovertarget="dialog"
 */
class PopovertargetAttribute extends Attribute
{
    /**
     * Creates a new popovertarget attribute instance.
     *
     * @param string|null $value The target popover id.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('popovertarget', $value);
    }

    /**
     * Returns the target popover id.
     *
     * @return string|null
     */
    public function getPopovertarget(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the target popover id.
     *
     * @param string|null $value The target popover id.
     *
     * @return static
     */
    public function setPopovertarget(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}