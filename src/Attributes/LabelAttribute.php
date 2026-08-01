<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML label attribute.
 *
 * Specifies a label associated with a form control or option
 * element.
 *
 * Examples:
 *
 * - label="English"
 * - label="Select a country"
 */
class LabelAttribute extends Attribute
{
    /**
     * Creates a new label attribute instance.
     *
     * @param string|null $value The label text.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('label', $value);
    }

    /**
     * Returns the label value.
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the label value.
     *
     * @param string|null $value The label text.
     *
     * @return static
     */
    public function setLabel(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}