<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML cols attribute.
 *
 * Specifies the visible width, in average character widths,
 * of a textarea element.
 *
 * Examples:
 *
 * - cols="40"
 * - cols="80"
 */
class ColsAttribute extends Attribute
{
    /**
     * Creates a new cols attribute instance.
     *
     * @param int|null $value The number of visible columns.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('cols', $value);
    }

    /**
     * Returns the number of columns.
     *
     * @return int|null
     */
    public function getCols(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the number of columns.
     *
     * @param int|null $value The number of visible columns.
     *
     * @return static
     */
    public function setCols(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}