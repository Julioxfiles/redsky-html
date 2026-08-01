<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML autocomplete attribute.
 *
 * Used by form controls to indicate whether the browser
 * should provide automatic completion of the field value.
 *
 * Examples:
 *
 * - autocomplete="on"
 * - autocomplete="off"
 * - autocomplete="email"
 * - autocomplete="username"
 */
class AutocompleteAttribute extends Attribute
{
    /**
     * Creates a new autocomplete attribute instance.
     *
     * @param string|null $value The autocomplete value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('autocomplete', $value);
    }

    /**
     * Returns the autocomplete value.
     *
     * @return string|null
     */
    public function getAutocomplete(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the autocomplete value.
     *
     * @param string|null $value The autocomplete value.
     *
     * @return static
     */
    public function setAutocomplete(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}