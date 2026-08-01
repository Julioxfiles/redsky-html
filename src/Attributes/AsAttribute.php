<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML as attribute.
 *
 * Specifies the name under which a fetched resource should
 * be stored when using preload or modulepreload.
 *
 * Examples:
 *
 * - as="script"
 * - as="style"
 * - as="image"
 * - as="font"
 */
class AsAttribute extends Attribute
{
    /**
     * Creates a new as attribute instance.
     *
     * @param string|null $value The resource type.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('as', $this->normalize($value));
    }

    /**
     * Returns the resource type.
     *
     * @return string|null
     */
    public function getAs(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the resource type.
     *
     * @param string|null $value The resource type.
     *
     * @return static
     */
    public function setAs(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the resource type.
     *
     * @param string|null $value The resource type.
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