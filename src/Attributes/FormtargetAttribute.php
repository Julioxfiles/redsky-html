<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML formtarget attribute.
 *
 * Specifies where to display the response received after
 * submitting a form through a submit button or input element.
 *
 * Examples:
 *
 * - formtarget="_blank"
 * - formtarget="_self"
 */
class FormtargetAttribute extends Attribute
{
    /**
     * Creates a new formtarget attribute instance.
     *
     * @param string|null $value The target value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('formtarget', $value);
    }

    /**
     * Returns the target value.
     *
     * @return string|null
     */
    public function getFormtarget(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the target value.
     *
     * @param string|null $value The target value.
     *
     * @return static
     */
    public function setFormtarget(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}