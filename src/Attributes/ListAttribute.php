<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML list attribute.
 *
 * Associates an input element with a datalist element by
 * referencing the datalist id.
 *
 * Examples:
 *
 * - list="countries"
 * - list="suggestions"
 */
class ListAttribute extends Attribute
{
    /**
     * Creates a new list attribute instance.
     *
     * @param string|null $value The datalist identifier.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('list', $value);
    }

    /**
     * Returns the datalist identifier.
     *
     * @return string|null
     */
    public function getList(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the datalist identifier.
     *
     * @param string|null $value The datalist identifier.
     *
     * @return static
     */
    public function setList(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}