<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML size attribute.
 *
 * Specifies the visible width of an input element or the number
 * of visible options in a select element.
 *
 * Examples:
 *
 * - size="20"
 * - size="5"
 */
class SizeAttribute extends Attribute
{
    /**
     * Creates a new size attribute instance.
     *
     * @param int|null $value The size value.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('size', $value);
    }

    /**
     * Returns the size value.
     *
     * @return int|null
     */
    public function getSize(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the size value.
     *
     * @param int|null $value The size value.
     *
     * @return static
     */
    public function setSize(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}