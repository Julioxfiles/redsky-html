<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML min attribute.
 *
 * Used by form controls to define the minimum allowed value.
 *
 * Examples:
 *
 * - min="0"
 * - min="18"
 * - min="2026-01-01"
 */
class MinAttribute extends Attribute
{
    /**
     * Creates a new min attribute instance.
     *
     * @param int|float|string|null $value The minimum value.
     */
    public function __construct(int|float|string|null $value = null)
    {
        parent::__construct('min', $value);
    }

    /**
     * Returns the minimum value.
     *
     * @return int|float|string|null
     */
    public function getMin(): int|float|string|null
    {
        return $this->getValue();
    }

    /**
     * Sets the minimum value.
     *
     * @param int|float|string|null $value The minimum value.
     *
     * @return static
     */
    public function setMin(int|float|string|null $value): static
    {
        $this->setValue($value);

        return $this;
    }
}