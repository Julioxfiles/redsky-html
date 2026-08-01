<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML form attribute.
 *
 * Associates a form-associated element with a form element
 * by referencing the form's id.
 *
 * Examples:
 *
 * - form="user-form"
 * - form="checkout-form"
 */
class FormAttribute extends Attribute
{
    /**
     * Creates a new form attribute instance.
     *
     * @param string|null $value The referenced form id.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('form', $value);
    }

    /**
     * Returns the referenced form id.
     *
     * @return string|null
     */
    public function getForm(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the referenced form id.
     *
     * @param string|null $value The referenced form id.
     *
     * @return static
     */
    public function setForm(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}