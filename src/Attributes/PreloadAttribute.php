<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML preload attribute.
 *
 * Specifies whether and how a media resource should be loaded
 * before it is needed.
 *
 * Examples:
 *
 * - preload="auto"
 * - preload="metadata"
 * - preload="none"
 */
class PreloadAttribute extends Attribute
{
    /**
     * Creates a new preload attribute instance.
     *
     * @param string|null $value The preload behavior.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('preload', $this->normalize($value));
    }

    /**
     * Returns the preload value.
     *
     * @return string|null
     */
    public function getPreload(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the preload value.
     *
     * @param string|null $value The preload behavior.
     *
     * @return static
     */
    public function setPreload(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the preload value.
     *
     * Allowed values:
     *
     * - auto
     * - metadata
     * - none
     *
     * @param string|null $value The preload behavior.
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