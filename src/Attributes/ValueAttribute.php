<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML value attribute.
 *
 * Examples:
 *
 * - value="John"
 * - value="123"
 * - value="Save"
 */
class ValueAttribute extends Attribute
{
    /**
     * Creates a new value attribute instance.
     *
     * @param mixed $value The attribute value.
     */
    public function __construct(mixed $value = null)
    {
        parent::__construct('value', $value);
    }

    /**
     * Returns the value.
     *
     * @return mixed
     */
    public function getAttributeValue(): mixed
    {
        return $this->getValue();
    }

    /**
     * Sets the value.
     *
     * @param mixed $value The attribute value.
     *
     * @return static
     */
    public function setAttributeValue(mixed $value): static
    {
        $this->setValue($value);

        return $this;
    }
}