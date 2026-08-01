<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML rows attribute.
 *
 * Specifies the number of visible text lines for a textarea element.
 *
 * Examples:
 *
 * - rows="5"
 * - rows="10"
 */
class RowsAttribute extends Attribute
{
    /**
     * Creates a new rows attribute instance.
     *
     * @param int|null $value The number of visible rows.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('rows', $value);
    }

    /**
     * Returns the number of rows.
     *
     * @return int|null
     */
    public function getRows(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the number of rows.
     *
     * @param int|null $value The number of visible rows.
     *
     * @return static
     */
    public function setRows(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}