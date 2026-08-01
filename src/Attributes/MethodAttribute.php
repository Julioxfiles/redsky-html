<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML method attribute.
 *
 * Used by form elements to define the HTTP method used when
 * submitting form data.
 *
 * Examples:
 *
 * - method="GET"
 * - method="POST"
 */
class MethodAttribute extends Attribute
{
    /**
     * Creates a new method attribute instance.
     *
     * @param string|null $value The HTTP method.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('method', $this->normalize($value));
    }

    /**
     * Returns the HTTP method.
     *
     * @return string|null
     */
    public function getMethod(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the HTTP method.
     *
     * @param string|null $value The HTTP method.
     *
     * @return static
     */
    public function setMethod(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the HTTP method value.
     *
     * @param string|null $value The HTTP method.
     *
     * @return string|null
     */
    protected function normalize(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return strtoupper(trim($value));
    }
}