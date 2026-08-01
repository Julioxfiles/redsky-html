<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML loading attribute.
 *
 * Specifies how a browser should load resources such as images
 * and iframes.
 *
 * Examples:
 *
 * - loading="lazy"
 * - loading="eager"
 */
class LoadingAttribute extends Attribute
{
    /**
     * Creates a new loading attribute instance.
     *
     * @param string|null $value The loading behavior.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('loading', $this->normalize($value));
    }

    /**
     * Returns the loading behavior.
     *
     * @return string|null
     */
    public function getLoading(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the loading behavior.
     *
     * @param string|null $value The loading behavior.
     *
     * @return static
     */
    public function setLoading(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the loading value.
     *
     * Allowed values:
     *
     * - lazy
     * - eager
     *
     * @param string|null $value The loading behavior.
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