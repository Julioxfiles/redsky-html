<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML alt attribute.
 *
 * Examples:
 *
 * - alt="User profile image"
 * - alt="Company logo"
 * - alt="Product photo"
 */
class AltAttribute extends Attribute
{
    /**
     * Creates a new alt attribute instance.
     *
     * @param string|null $value The alternative text value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('alt', $value);
    }

    /**
     * Returns the alternative text value.
     *
     * @return string|null
     */
    public function getAlt(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the alternative text value.
     *
     * @param string|null $value The alternative text value.
     *
     * @return static
     */
    public function setAlt(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}