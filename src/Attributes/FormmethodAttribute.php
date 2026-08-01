<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML formmethod attribute.
 *
 * Specifies the HTTP method used when submitting form data
 * through a submit button or input element.
 *
 * Examples:
 *
 * - formmethod="GET"
 * - formmethod="POST"
 */
class FormmethodAttribute extends Attribute
{
    /**
     * Creates a new formmethod attribute instance.
     *
     * @param string|null $value The HTTP method.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('formmethod', $this->normalize($value));
    }

    /**
     * Returns the HTTP method.
     *
     * @return string|null
     */
    public function getFormmethod(): ?string
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
    public function setFormmethod(?string $value): static
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