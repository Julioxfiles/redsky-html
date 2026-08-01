<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML allow attribute.
 *
 * Specifies permissions and features allowed for an iframe
 * using the Permissions Policy mechanism.
 *
 * Examples:
 *
 * - allow="fullscreen"
 * - allow="camera; microphone"
 */
class AllowAttribute extends Attribute
{
    /**
     * Creates a new allow attribute instance.
     *
     * @param string|null $value The allowed features.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('allow', $value);
    }

    /**
     * Returns the allowed features.
     *
     * @return string|null
     */
    public function getAllow(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the allowed features.
     *
     * @param string|null $value The allowed features.
     *
     * @return static
     */
    public function setAllow(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}