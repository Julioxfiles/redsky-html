<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML for attribute.
 *
 * Associates a label element with a form control by referencing
 * the control's id attribute.
 *
 * Examples:
 *
 * - for="email"
 * - for="password"
 * - for="remember"
 */
class ForAttribute extends Attribute
{
    /**
     * Creates a new for attribute instance.
     *
     * @param string|null $value The referenced element id.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('for', $value);
    }

    /**
     * Returns the referenced element id.
     *
     * @return string|null
     */
    public function getFor(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the referenced element id.
     *
     * @param string|null $value The referenced element id.
     *
     * @return static
     */
    public function setFor(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}