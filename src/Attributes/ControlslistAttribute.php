<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML controlslist attribute.
 *
 * Specifies which controls should be hidden from the native
 * media player controls.
 *
 * Examples:
 *
 * - controlslist="nodownload"
 * - controlslist="nofullscreen"
 * - controlslist="noremoteplayback"
 */
class ControlslistAttribute extends Attribute
{
    /**
     * Creates a new controlslist attribute instance.
     *
     * @param string|null $value The controls list value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('controlslist', $value);
    }

    /**
     * Returns the controls list value.
     *
     * @return string|null
     */
    public function getControlslist(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the controls list value.
     *
     * @param string|null $value The controls list value.
     *
     * @return static
     */
    public function setControlslist(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}