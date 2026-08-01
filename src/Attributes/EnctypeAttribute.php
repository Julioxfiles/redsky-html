<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML enctype attribute.
 *
 * Specifies how form data should be encoded when submitted.
 *
 * Examples:
 *
 * - enctype="application/x-www-form-urlencoded"
 * - enctype="multipart/form-data"
 * - enctype="text/plain"
 */
class EnctypeAttribute extends Attribute
{
    /**
     * Creates a new enctype attribute instance.
     *
     * @param string|null $value The encoding type.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('enctype', $this->normalize($value));
    }

    /**
     * Returns the encoding type.
     *
     * @return string|null
     */
    public function getEnctype(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the encoding type.
     *
     * @param string|null $value The encoding type.
     *
     * @return static
     */
    public function setEnctype(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the encoding type.
     *
     * @param string|null $value The encoding type.
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