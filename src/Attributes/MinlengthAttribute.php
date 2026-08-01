<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML minlength attribute.
 *
 * Specifies the minimum number of characters that the user
 * must enter into an input or textarea element.
 *
 * Examples:
 *
 * - minlength="8"
 * - minlength="20"
 */
class MinlengthAttribute extends Attribute
{
    /**
     * Creates a new minlength attribute instance.
     *
     * @param int|null $value The minimum number of characters.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('minlength', $value);
    }

    /**
     * Returns the minimum length.
     *
     * @return int|null
     */
    public function getMinlength(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the minimum length.
     *
     * @param int|null $value The minimum number of characters.
     *
     * @return static
     */
    public function setMinlength(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}