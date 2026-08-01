<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML shape attribute.
 *
 * Specifies the shape of an area element in an image map.
 *
 * Examples:
 *
 * - shape="rect"
 * - shape="circle"
 * - shape="poly"
 */
class ShapeAttribute extends Attribute
{
    /**
     * Creates a new shape attribute instance.
     *
     * @param string|null $value The area shape.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('shape', $this->normalize($value));
    }

    /**
     * Returns the shape value.
     *
     * @return string|null
     */
    public function getShape(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the shape value.
     *
     * @param string|null $value The area shape.
     *
     * @return static
     */
    public function setShape(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the shape value.
     *
     * Allowed values:
     *
     * - default
     * - rect
     * - circle
     * - poly
     *
     * @param string|null $value The area shape.
     *
     * @return string|null
     */
    protected function normalize(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return strtolower(trim($value));
    }
}