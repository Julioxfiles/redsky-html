<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML usemap attribute.
 *
 * Specifies a client-side image map associated with an image
 * element.
 *
 * Examples:
 *
 * - usemap="#map-name"
 */
class UsemapAttribute extends Attribute
{
    /**
     * Creates a new usemap attribute instance.
     *
     * @param string|null $value The image map reference.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('usemap', $value);
    }

    /**
     * Returns the image map reference.
     *
     * @return string|null
     */
    public function getUsemap(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the image map reference.
     *
     * @param string|null $value The image map reference.
     *
     * @return static
     */
    public function setUsemap(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}