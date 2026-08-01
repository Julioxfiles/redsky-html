<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML inputmode attribute.
 *
 * Specifies what type of input mechanism is most appropriate
 * for an editable element, especially on mobile devices.
 *
 * Examples:
 *
 * - inputmode="numeric"
 * - inputmode="decimal"
 * - inputmode="email"
 * - inputmode="search"
 */
class InputmodeAttribute extends Attribute
{
    /**
     * Creates a new inputmode attribute instance.
     *
     * @param string|null $value The input mode value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('inputmode', $this->normalize($value));
    }

    /**
     * Returns the input mode value.
     *
     * @return string|null
     */
    public function getInputmode(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the input mode value.
     *
     * @param string|null $value The input mode value.
     *
     * @return static
     */
    public function setInputmode(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the input mode value.
     *
     * Allowed values:
     *
     * - none
     * - text
     * - decimal
     * - numeric
     * - tel
     * - search
     * - email
     * - url
     *
     * @param string|null $value The input mode value.
     *
     * @return string|null
     */
    protected function normalize(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return strtolower(trim($value));
    }
}