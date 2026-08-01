<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML height attribute.
 *
 * Specifies the height of elements that support height sizing,
 * such as images, canvas elements and embedded content.
 *
 * Examples:
 *
 * - height="200"
 * - height="600"
 */
class HeightAttribute extends Attribute
{
    /**
     * Creates a new height attribute instance.
     *
     * @param int|null $value The height value.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('height', $value);
    }

    /**
     * Returns the height value.
     *
     * @return int|null
     */
    public function getHeight(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the height value.
     *
     * @param int|null $value The height value.
     *
     * @return static
     */
    public function setHeight(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}