<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML max attribute.
 *
 * Used by form controls to define the maximum allowed value.
 *
 * Examples:
 *
 * - max="100"
 * - max="65"
 * - max="2026-12-31"
 */
class MaxAttribute extends Attribute
{
    /**
     * Creates a new max attribute instance.
     *
     * @param int|float|string|null $value The maximum value.
     */
    public function __construct(int|float|string|null $value = null)
    {
        parent::__construct('max', $value);
    }

    /**
     * Returns the maximum value.
     *
     * @return int|float|string|null
     */
    public function getMax(): int|float|string|null
    {
        return $this->getValue();
    }

    /**
     * Sets the maximum value.
     *
     * @param int|float|string|null $value The maximum value.
     *
     * @return static
     */
    public function setMax(int|float|string|null $value): static
    {
        $this->setValue($value);

        return $this;
    }
}