<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML placeholder attribute.
 *
 * Examples:
 *
 * - placeholder="Enter your email"
 * - placeholder="Search..."
 * - placeholder="First name"
 */
class PlaceholderAttribute extends Attribute
{
    /**
     * Creates a new placeholder attribute instance.
     *
     * @param string|null $value The placeholder value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('placeholder', $value);
    }

    /**
     * Returns the placeholder value.
     *
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the placeholder value.
     *
     * @param string|null $value The placeholder value.
     *
     * @return static
     */
    public function setPlaceholder(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}