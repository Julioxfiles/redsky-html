<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML start attribute.
 *
 * Specifies the starting value of an ordered list.
 *
 * Examples:
 *
 * - start="5"
 * - start="100"
 */
class StartAttribute extends Attribute
{
    /**
     * Creates a new start attribute instance.
     *
     * @param int|null $value The starting number.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('start', $value);
    }

    /**
     * Returns the starting value.
     *
     * @return int|null
     */
    public function getStart(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the starting value.
     *
     * @param int|null $value The starting number.
     *
     * @return static
     */
    public function setStart(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}