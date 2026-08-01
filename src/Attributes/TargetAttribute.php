<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML target attribute.
 *
 * Used by anchor and form elements to define where the linked
 * or submitted resource should be opened.
 *
 * Examples:
 *
 * - target="_blank"
 * - target="_self"
 * - target="_parent"
 */
class TargetAttribute extends Attribute
{
    /**
     * Creates a new target attribute instance.
     *
     * @param string|null $value The target value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('target', $value);
    }

    /**
     * Returns the target value.
     *
     * @return string|null
     */
    public function getTarget(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the target value.
     *
     * @param string|null $value The target value.
     *
     * @return static
     */
    public function setTarget(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}