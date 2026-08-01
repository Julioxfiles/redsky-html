<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML id attribute.
 *
 * Examples:
 *
 * - id="header"
 * - id="submit-button"
 * - id="user-profile"
 */
class IdAttribute extends Attribute
{
    /**
     * Creates a new id attribute instance.
     *
     * @param string|null $value The id value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('id', $value);
    }

    /**
     * Returns the id value.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the id value.
     *
     * @param string|null $value The id value.
     *
     * @return static
     */
    public function setId(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}