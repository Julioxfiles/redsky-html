<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML contenteditable attribute.
 *
 * Specifies whether the contents of an element can be edited
 * directly by the user.
 *
 * Examples:
 *
 * - contenteditable="true"
 * - contenteditable="false"
 * - contenteditable="plaintext-only"
 */
class ContenteditableAttribute extends Attribute
{
    /**
     * Creates a new contenteditable attribute instance.
     *
     * @param string|null $value The contenteditable value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('contenteditable', $this->normalize($value));
    }

    /**
     * Returns the contenteditable value.
     *
     * @return string|null
     */
    public function getContenteditable(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the contenteditable value.
     *
     * @param string|null $value The contenteditable value.
     *
     * @return static
     */
    public function setContenteditable(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the contenteditable value.
     *
     * Allowed values are:
     * - true
     * - false
     * - plaintext-only
     *
     * @param string|null $value The contenteditable value.
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