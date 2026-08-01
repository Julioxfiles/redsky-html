<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML accept attribute.
 *
 * Used by file input elements to define the types of files
 * that can be selected.
 *
 * Examples:
 *
 * - accept="image/*"
 * - accept=".pdf"
 * - accept="image/png,image/jpeg"
 */
class AcceptAttribute extends Attribute
{
    /**
     * Creates a new accept attribute instance.
     *
     * @param string|null $value The accepted file types.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('accept', $value);
    }

    /**
     * Returns the accepted file types.
     *
     * @return string|null
     */
    public function getAccept(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the accepted file types.
     *
     * @param string|null $value The accepted file types.
     *
     * @return static
     */
    public function setAccept(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}