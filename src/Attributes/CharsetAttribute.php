<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML charset attribute.
 *
 * Specifies the character encoding used by the linked resource.
 *
 * Examples:
 *
 * - charset="UTF-8"
 * - charset="ISO-8859-1"
 */
class CharsetAttribute extends Attribute
{
    /**
     * Creates a new charset attribute instance.
     *
     * @param string|null $value The character encoding.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('charset', $value);
    }

    /**
     * Returns the character encoding.
     *
     * @return string|null
     */
    public function getCharset(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the character encoding.
     *
     * @param string|null $value The character encoding.
     *
     * @return static
     */
    public function setCharset(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}