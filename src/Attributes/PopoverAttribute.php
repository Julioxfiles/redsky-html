<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML popover attribute.
 *
 * Specifies that an element is a popover element and defines
 * its behavior.
 *
 * Examples:
 *
 * - popover
 * - popover="auto"
 * - popover="manual"
 */
class PopoverAttribute extends Attribute
{
    /**
     * Creates a new popover attribute instance.
     *
     * @param string|bool|null $value The popover behavior.
     */
    public function __construct(string|bool|null $value = null)
    {
        parent::__construct('popover', $this->normalize($value));
    }

    /**
     * Returns the popover value.
     *
     * @return string|bool|null
     */
    public function getPopover(): string|bool|null
    {
        return $this->getValue();
    }

    /**
     * Sets the popover value.
     *
     * @param string|bool|null $value The popover behavior.
     *
     * @return static
     */
    public function setPopover(string|bool|null $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the popover value.
     *
     * Allowed values:
     *
     * - true
     * - false
     * - auto
     * - manual
     *
     * @param string|bool|null $value The popover behavior.
     *
     * @return string|bool|null
     */
    protected function normalize(string|bool|null $value): string|bool|null
    {
        if ($value === null || is_bool($value)) {
            return $value;
        }

        return strtolower(trim($value));
    }
}