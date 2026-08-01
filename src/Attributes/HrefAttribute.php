<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML href attribute.
 *
 * Examples:
 *
 * - href="/users"
 * - href="https://example.com"
 * - href="#section"
 */
class HrefAttribute extends Attribute
{
    /**
     * Creates a new href attribute instance.
     *
     * @param string|null $value The href value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('href', $value);
    }

    /**
     * Returns the href value.
     *
     * @return string|null
     */
    public function getHref(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the href value.
     *
     * @param string|null $value The href value.
     *
     * @return static
     */
    public function setHref(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}