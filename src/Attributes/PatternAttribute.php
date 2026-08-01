<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML pattern attribute.
 *
 * Used by form controls to define a regular expression pattern
 * that the input value must match.
 *
 * Examples:
 *
 * - pattern="[A-Za-z]+"
 * - pattern="\d{5}"
 */
class PatternAttribute extends Attribute
{
    /**
     * Creates a new pattern attribute instance.
     *
     * @param string|null $value The regular expression pattern.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('pattern', $value);
    }

    /**
     * Returns the pattern value.
     *
     * @return string|null
     */
    public function getPattern(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the pattern value.
     *
     * @param string|null $value The regular expression pattern.
     *
     * @return static
     */
    public function setPattern(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}