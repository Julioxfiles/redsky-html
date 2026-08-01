<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML draggable attribute.
 *
 * Specifies whether an element can be dragged using the
 * HTML Drag and Drop API.
 *
 * Examples:
 *
 * - draggable="true"
 * - draggable="false"
 * - draggable="auto"
 */
class DraggableAttribute extends Attribute
{
    /**
     * Creates a new draggable attribute instance.
     *
     * @param string|null $value The draggable value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('draggable', $this->normalize($value));
    }

    /**
     * Returns the draggable value.
     *
     * @return string|null
     */
    public function getDraggable(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the draggable value.
     *
     * @param string|null $value The draggable value.
     *
     * @return static
     */
    public function setDraggable(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the draggable value.
     *
     * Allowed values are:
     * - true
     * - false
     * - auto
     *
     * @param string|null $value The draggable value.
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