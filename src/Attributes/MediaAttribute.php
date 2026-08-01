<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML media attribute.
 *
 * Specifies the media or device for which the linked resource
 * is optimized.
 *
 * Examples:
 *
 * - media="screen"
 * - media="print"
 * - media="(max-width: 768px)"
 */
class MediaAttribute extends Attribute
{
    /**
     * Creates a new media attribute instance.
     *
     * @param string|null $value The media query or media type.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('media', $value);
    }

    /**
     * Returns the media value.
     *
     * @return string|null
     */
    public function getMedia(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the media value.
     *
     * @param string|null $value The media query or media type.
     *
     * @return static
     */
    public function setMedia(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}