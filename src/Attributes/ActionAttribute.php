<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML action attribute.
 *
 * Used by form elements to define the URL where the form data
 * will be submitted.
 *
 * Examples:
 *
 * - action="/users/store"
 * - action="https://example.com/process"
 */
class ActionAttribute extends Attribute
{
    /**
     * Creates a new action attribute instance.
     *
     * @param string|null $value The action URL.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('action', $value);
    }

    /**
     * Returns the action URL.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the action URL.
     *
     * @param string|null $value The action URL.
     *
     * @return static
     */
    public function setAction(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}