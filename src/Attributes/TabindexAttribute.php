<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML tabindex attribute.
 *
 * Used to control the keyboard navigation order of an element.
 *
 * Examples:
 *
 * - tabindex="0"
 * - tabindex="-1"
 * - tabindex="5"
 */
class TabindexAttribute extends Attribute
{
    /**
     * Creates a new tabindex attribute instance.
     *
     * @param int|null $value The tabindex value.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('tabindex', $value);
    }

    /**
     * Returns the tabindex value.
     *
     * @return int|null
     */
    public function getTabindex(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the tabindex value.
     *
     * @param int|null $value The tabindex value.
     *
     * @return static
     */
    public function setTabindex(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}