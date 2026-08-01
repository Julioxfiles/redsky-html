<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML capture attribute.
 *
 * Specifies that a file input should capture media directly
 * from a device camera, microphone or other input source.
 *
 * Examples:
 *
 * - capture
 * - capture="user"
 * - capture="environment"
 */
class CaptureAttribute extends Attribute
{
    /**
     * Creates a new capture attribute instance.
     *
     * @param string|bool|null $value The capture value.
     */
    public function __construct(string|bool|null $value = null)
    {
        parent::__construct('capture', $value);
    }

    /**
     * Returns the capture value.
     *
     * @return string|bool|null
     */
    public function getCapture(): string|bool|null
    {
        return $this->getValue();
    }

    /**
     * Sets the capture value.
     *
     * @param string|bool|null $value The capture value.
     *
     * @return static
     */
    public function setCapture(string|bool|null $value): static
    {
        $this->setValue($value);

        return $this;
    }
}