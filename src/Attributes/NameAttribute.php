<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML name attribute.
 *
 * Examples:
 *
 * - name="email"
 * - name="password"
 * - name="first_name"
 */
class NameAttribute extends Attribute
{
    /**
     * Creates a new name attribute instance.
     *
     * @param string|null $value The name value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('name', $value);
    }

    /**
     * Returns the name value.
     *
     * @return string|null
     */
    public function getNameValue(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the name value.
     *
     * @param string|null $value The name value.
     *
     * @return static
     */
    public function setNameValue(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}