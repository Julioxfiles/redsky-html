<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML accept-charset attribute.
 *
 * Specifies the character encodings that a form accepts.
 *
 * Examples:
 *
 * - accept-charset="UTF-8"
 * - accept-charset="UTF-8 ISO-8859-1"
 */
class AcceptCharsetAttribute extends Attribute
{
    /**
     * Creates a new accept-charset attribute instance.
     *
     * @param string|null $value The accepted character encodings.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('accept-charset', $value);
    }

    /**
     * Returns the accepted character encodings.
     *
     * @return string|null
     */
    public function getAcceptCharset(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the accepted character encodings.
     *
     * @param string|null $value The accepted character encodings.
     *
     * @return static
     */
    public function setAcceptCharset(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}