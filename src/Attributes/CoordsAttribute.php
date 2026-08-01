<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML coords attribute.
 *
 * Specifies the coordinates of an area element inside an
 * image map.
 *
 * Examples:
 *
 * - coords="0,0,100,100"
 * - coords="50,50,25"
 */
class CoordsAttribute extends Attribute
{
    /**
     * Creates a new coords attribute instance.
     *
     * @param string|null $value The coordinates value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('coords', $value);
    }

    /**
     * Returns the coordinates value.
     *
     * @return string|null
     */
    public function getCoords(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the coordinates value.
     *
     * @param string|null $value The coordinates value.
     *
     * @return static
     */
    public function setCoords(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}