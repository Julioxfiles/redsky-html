<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML type attribute.
 *
 * Examples:
 *
 * - type="text"
 * - type="submit"
 * - type="button"
 * - type="email"
 */
class TypeAttribute extends Attribute
{
    /**
     * Creates a new type attribute instance.
     *
     * @param string|null $value The type value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('type', $value);
    }

    /**
     * Returns the type value.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the type value.
     *
     * @param string|null $value The type value.
     *
     * @return static
     */
    public function setType(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}