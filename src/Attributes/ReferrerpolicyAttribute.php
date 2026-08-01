<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML referrerpolicy attribute.
 *
 * Specifies the referrer information sent when making
 * requests from an element.
 *
 * Examples:
 *
 * - referrerpolicy="no-referrer"
 * - referrerpolicy="origin"
 * - referrerpolicy="strict-origin"
 */
class ReferrerpolicyAttribute extends Attribute
{
    /**
     * Creates a new referrerpolicy attribute instance.
     *
     * @param string|null $value The referrer policy value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('referrerpolicy', $this->normalize($value));
    }

    /**
     * Returns the referrer policy value.
     *
     * @return string|null
     */
    public function getReferrerpolicy(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the referrer policy value.
     *
     * @param string|null $value The referrer policy value.
     *
     * @return static
     */
    public function setReferrerpolicy(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the referrer policy value.
     *
     * @param string|null $value The referrer policy value.
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