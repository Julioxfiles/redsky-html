<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML dir attribute.
 *
 * Specifies the text direction of the content inside an element.
 *
 * Examples:
 *
 * - dir="ltr"
 * - dir="rtl"
 * - dir="auto"
 */
class DirAttribute extends Attribute
{
    /**
     * Creates a new dir attribute instance.
     *
     * @param string|null $value The text direction.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('dir', $this->normalize($value));
    }

    /**
     * Returns the text direction.
     *
     * @return string|null
     */
    public function getDir(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the text direction.
     *
     * @param string|null $value The text direction.
     *
     * @return static
     */
    public function setDir(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the direction value.
     *
     * Allowed values:
     *
     * - ltr
     * - rtl
     * - auto
     *
     * @param string|null $value The text direction.
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